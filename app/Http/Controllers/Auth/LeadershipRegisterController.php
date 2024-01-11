<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Page,MembershipPlan,ServiceArea,Role};

class LeadershipRegisterController extends Controller
{
    public function showLeadershipRegister(){
        $data['page'] = Page::where('slug','leadership-registration')->first();
        if (is_null($data['page'])) {
            abort(404,'Page Not Found!');
        }
        $data['page_content'] = json_decode($data['page']->content);
        $data['members'] = MembershipPlan::where('status','active')->get();
        $data['service_areas'] = ServiceArea::get();

        return view('auth.register.leadership-registration',$data);
    }

    public function leadershipRegister(Request $request){
    
        $values = $request->validate(
            [
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d).{8,}$/',
                'membership'=>'required|integer',
                'service_area'=>'nullable|integer',
            ],
            [   'password.required'=>'The password field is required',
                'password.regex' => "Your password must be at least 8 characters and contain at least one letter and one number."
            ]
        );

        $membershipPlan = MembershipPlan::findOrFail($values['membership']);
        $serviceArea = ServiceArea::findOrFail($values['service_area']);
        $role = Role::where('name','User')->first();

        $user = new User;
        $user->fill($request->all());
        $user->role()->associate($role);
        $user->membershipPlan()->associate($membershipPlan);
        $user->serviceArea()->associate($serviceArea);
        $user->save();

        return redirect()->route('home')->with('success','You have successfully registered.');
    }
}
