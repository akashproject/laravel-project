<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Page,MembershipPlan,ServiceArea,Role};

class MemberRegisterController extends Controller
{
    public function showMemberRegister(){
        $data['page'] = Page::where('slug','member-registration')->first();
        if (is_null($data['page'])) {
            abort(404,'Page Not Found!');
        }
        $data['page_content'] = json_decode($data['page']->content);
        $data['members'] = MembershipPlan::where('status','active')->get();
        $data['service_areas'] = ServiceArea::get();

        return view('auth.register.member-registration',$data);
    }

    public function memberRegister(Request $request){
        $values = $request->validate(
            [
                'focus_area'=>'required|string|max:255',
                'service_area'=>'nullable|integer',
                'organization_budget'=>'required|string|max:255',
                'organization_size'=>'required|string|max:255',
                'organization_name'=>'required|string|max:255',
                'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d).{8,}$/',
                'email' => 'required|string|email|max:255|unique:users,email',
                'role' => 'required|string|max:255',
                'fullname' => 'required|string|max:255',
                'membership'=>'required|integer',
            ],
            [
               'password.required'=>'The password field is required',
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
