<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Page,MembershipPlan,ServiceArea,Role};


class MobilizerRegisterController extends Controller
{
    public function showMobilizerRegister(){
        $data['page'] = Page::where('slug','mobilizer-registration')->first();
        if (is_null($data['page'])) {
            abort(404,'Page Not Found!');
        }
        $data['page_content'] = json_decode($data['page']->content);
        $data['members'] = MembershipPlan::where('status','active')->get();

        return view('auth.register.mobilizer-registration',$data);
    }

    public function mobilizerRegister(Request $request){
        $values = $request->validate(
            [
                'organization_name'=>'required|string|max:255',
                'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d).{8,}$/',
                'email' => 'required|string|email|max:255|unique:users,email',
                'role'=>'required|string|max:255',
                'fullname' => 'required|string|max:255',
                'membership'=>'required|integer',
            ],
            [   'password.required'=>'The password field is required',
                'password.regex' => "Your password must be at least 8 characters and contain at least one letter and one number."
            ]
        );

        $membershipPlan = MembershipPlan::findOrFail($values['membership']);
        $role = Role::where('name','User')->first();

        $user = new User;
        $user->fill($request->all());
        $user->role()->associate($role);
        $user->membershipPlan()->associate($membershipPlan);
        $user->save();

        return redirect()->route('home')->with('success','You have successfully registered.');
    }
}
