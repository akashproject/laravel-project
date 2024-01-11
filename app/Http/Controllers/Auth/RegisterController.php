<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\{User,Page,MembershipPlan,ServiceArea,Role,UserDetails};
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        // dd($request->ref);
        $data['page'] = Page::where('slug','register')->first();
        if (is_null($data['page'])) {
            abort(404,'Page Not Found!');
        }
        $data['page_content'] = json_decode($data['page']->content);
        $data['members'] = MembershipPlan::where('status','active')->get();
        $data['service_areas'] = ServiceArea::get();

        if(!empty($request->ref)){
            $data['referrer_user'] = User::where('email', $request->ref)->first();
        }

        return view('auth.register',$data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            /*'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],*/
                'focus_area'=>'required|string|max:255',
                'service_area'=>'nullable|integer',
                'organization_budget'=>'required|string|max:255',
                'organization_size'=>'required|string|max:255',
                'organization_name'=>'required|string|max:255',
                'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d).{8,}$/',
                'email' => 'required|string|email|max:255|unique:users,email',
                'role_name' => 'required|string|max:255',
                'fullname' => 'required|string|max:255',
                'membership'=>'required|integer',
            ],
            [
                'password.required'=>'The password field is required',
                'password.regex' => "Your password must be at least 8 characters and contain at least one letter and one number."
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        ;*/

        $referrer = User::where('email',$data['referrer'])->first();  // for referrer

        if (empty($data['first_name']) || empty($data['last_name'])) {
            $fullname = explode(" ", $data['fullname']);
            $f_name = $fullname[0];
            $l_name = $fullname[1];
        }

        $membershipPlan = MembershipPlan::findOrFail($data['membership']);
        $role = Role::where('name', 'User')->first();

        $user = new User([
            'first_name' => $f_name,
            'last_name' => $l_name,
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile_number' => $data['mobile_number'] ?? '',
            'role_name' => $data['role_name'],
            'refer_by' => $data['refer_by'] ?? null,
        ]);



        $user->role()->associate($role);
        $user->membershipPlan()->associate($membershipPlan);

        // Check if service_area is provided before trying to associate it
        if (!empty($data['service_area'])) {
            $serviceArea = ServiceArea::findOrFail($data['service_area']);
            $user->serviceArea()->associate($serviceArea);
        }

        // for referrer
        if (!empty($data['referrer'])) {
            $user->refer_by = $referrer->id;
        }

        // Save the user instance to the database
        $user->save();

        $userDetailsArray = [
            'organization_name' => $data['organization_name'],
            'organization_size' => $data['organization_size'],
            'organization_budget' => $data['organization_budget'],
            'focus_area' => $data['focus_area'],
        ];

        // Create and associate a new UserDetails model
        $userDetails = new UserDetails($userDetailsArray);
        $user->userDetails()->save($userDetails);

        return $user;
    }
}
