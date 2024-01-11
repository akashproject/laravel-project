<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,UserDetails,MembershipPlan};
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct(){
        $this->user = Auth::user();
    }

    public function account()
    {
        $user = Auth::user();
        return view('frontend.dashboard.account',compact('user'));
    }

    public function profile()
    {
        $auth_user = Auth::user();
        $user = $auth_user->userDetails;
        return view('frontend.dashboard.profile',compact('user'));
    }

    public function education()
    {
        $auth_user = Auth::user();
        $user = $auth_user->userDetails;
        return view('frontend.dashboard.education',compact('user'));
    }

    public function referProgram()
    {
        return view('frontend.dashboard.refer-program');
    }

    public function companyDetails()
    {
        $auth_user = Auth::user();
        $user = $auth_user->userDetails;

        return view('frontend.dashboard.company-details',compact('user'));
    }

    public function updateAccount(Request $request){
        $user = Auth::user();
        $request->validate([
            'first_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email,'.$user->id,
            'mobile_number'=>'required|numeric|digits:10',
            'profile_picture'=>'nullable|mimes:jpg,png,svg,jpeg'
        ]);

        if ($request->hasFile('profile_picture')) {
            if (Storage::exists('public/users/'.$user->profile_picture)) {
                Storage::delete('public/users/'.$user->profile_picture);
            }
            $profile_picture = $request->file('profile_picture');
            $ext = $profile_picture->extension();
            $filename = uniqid().'.'.$ext;
            $profile_picture->storeAs('public/users/',$filename);
            $user->profile_picture = $filename;
        }
        $user->fill($request->except('profile_picture'));
        $user->fullname = $request->first_name.' '.$request->last_name;
        $user->save();

        return redirect()->back()->with('success','Acoount data has been updated successfully.');
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $dob = date('d/m/Y',strtotime($request->dob));
        $values = $request->validate([
            'dob'=> 'required',
            'city'=> 'required|string|max:120',
            'country'=> 'required|string|max:120',
            'other_contact_number'=>'required|numeric|digits:10',
        ]);
        $userDetails = $user->userDetails;

        if (is_null($userDetails)) {
           $userDetails =  new UserDetails;
           $userDetails->dob = $dob;
           $userDetails->city = $values['city'];
           $userDetails->country = $values['country'];
           $userDetails->other_contact_number = $values['other_contact_number'];
           $user->userDetails()->save($userDetails);
        }
        $userDetails->fill($request->except('dob'));
        $userDetails->dob = $dob;
        $userDetails->save();

        return redirect()->back()->with('success','Profile data has been updated successfully.');
    }

    public function updateCompanyDetails(Request $request)
    {
        $user = Auth::user();
        $values = $request->validate([
            'name_of_company'=> 'required|string|max:255',
            'company_turn_over'=> 'required|string|max:255',
            'number_of_employee'=> 'required|string|max:255',
        ]);
        $userDetails = $user->userDetails;

        if (is_null($userDetails)) {
            $userDetails =  new UserDetails;
            $userDetails->name_of_company = $values['name_of_company'];
            $userDetails->company_turn_over = $values['company_turn_over'];
            $userDetails->country = $values['name_of_company'];
            $userDetails->number_of_employee = $values['number_of_employee'];
            $user->userDetails()->save($userDetails);
        }
        $userDetails->fill($request->all());
        $userDetails->save();

        return redirect()->back()->with('success','Company details has been updated successfully.');
    }

    /*public function searchMember(Request $request)
    {
        $query = User::query();

        $query->when($request->filled('first_name'), function ($query) use ($request) {
            $query->where('first_name', 'like', "%{$request->first_name}%");
        })
        ->when($request->filled('last_name'), function ($query) use ($request) {
            $query->where('last_name', 'like', "%{$request->last_name}%");
        })
        ->when($request->filled('email'), function ($query) use ($request) {
            $query->where('email', 'like', "%{$request->email}%");
        });

        $users = $query->get();

        return $users->count()
            ? redirect()->route('refer-program-result')->with('users', $users)->withInput($request->all())
            : redirect()->route('refer-program-result')->withInput($request->all());
    }*/


    public function searchMember(Request $request)
    {
        $query = User::from('users');
        $query->when($request->first_name ?? false, function ($query, $value) {
            $query->where('first_name', 'like', "%$value%");
        })
        ->when($request->last_name ?? false, function ($query, $value) {
            $query->where('last_name', 'like', "%$value%");
        })
        ->when($request->email ?? false, function ($query, $value) {
            $query->where('email', 'like', "%$value%");
        })->where('role_id',2);

        $users = $query->get();
        return view('frontend.dashboard.refer-program-result',compact('users'));
    }



    public function sendReferMemberMail(Request $request){

        $user = auth()->user();
        $url = URL::to('/');

        if (!empty($request->fullname) && !empty($request->email)) {

            $userAvailable = User::where('email',$request->email)->first();
            if (!$userAvailable) {
                $register_url = $url.'/register?ref='.$user->email.'&'.'u='.$request->email;
                $mailArrayData = [
                    'url' => $register_url,
                    'email' => $request->email,
                    'fullname' => $request->fullname,
                    'user_name' => $user->first_name.' '.$user->last_name
                ];

                \Mail::to($request->email)->queue(new \App\Mail\ReferMember($mailArrayData));
                return redirect()->back()->with('success','Mail send successfully');
            }
            else{
                return redirect()->route('refer-member')->with('error','User already exists');
            }
        }
    }

    public function updateEducation(Request $request)
    {
        $user = Auth::user();
        $values = $request->validate([
            'university_name'=>'required|max:255',
            'college_name'=>'required|max:255',
            'about_education'=>'required|max:2000',
        ]);
        $userDetails = $user->userDetails;
        if (is_null($userDetails)) {
            $userDetails =  new UserDetails;
            $userDetails->name_of_company = $values['university_name'];
            $userDetails->company_turn_over = $values['college_name'];
            $userDetails->about_education = $values['about_education'];
            $user->userDetails()->save($userDetails);
        }
        $userDetails->fill($request->all());
        $userDetails->save();
        return redirect()->back()->with('success','Education details has been updated successfully.');
    }

    public function memberList()
    {
        /*$membershipPlan = MembershipPlan::where('slug','bncep-members')->first();
        $members = User::where('membership_plan_id',$membershipPlan->id)->get();*/

        $members = User::whereHas('membershipPlan', function ($query) {
            $query->where('slug', 'bncep-members');
        })->get();
        return view('frontend.dashboard.members',compact('members'));
    }

    public function searchMemberList(Request $request)
    {
        $member = $request->member;
        /*$members = User::where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', '%' . $request['member'] . '%')
        ->where('membership_plan_id',1)
        ->get();*/

        if (empty($request['member'])) {
            return redirect()->back();
        }

        $members = User::whereHas('membershipPlan', function ($query) use ($request) {
            $query->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', '%' . $request['member'] . '%');
            $query->where('slug', 'bncep-members');
        })->where('role_id',2);
        $totalMembersCount = $members->count();
        $members = $members->paginate(1);

        return view('frontend.dashboard.member-search-list',compact('members','totalMembersCount'));
    }

    public function showMemberProfile(Request $request, $user_id)
    {
        try {
            $u_id = decrypt($user_id);
            $user = User::findOrFail($u_id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
        return view('frontend.dashboard.member-profile', compact('user'));
    }

    public function showEditPassword(Request $request)
    {
       $user = Auth::user();
       return view('frontend.dashboard.edit-password',compact('user'));
    }

    public function updatePassword(Request $request)
    {
       $user = Auth::user();
       $request->validate([
            'current_password'=> 'required',
            'new_password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d).{8,}$/',
            'confirm_password'=> 'required|same:new_password',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
        }
        else{
            return redirect()->back()->with('error','Current password does not match!!');
        }
        $user->update();
        return redirect()->route('account')->with('success','Password has been updated successfully!!');
    }

}
