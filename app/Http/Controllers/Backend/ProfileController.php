<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\SiteSetting;
use Batch;

class ProfileController extends Controller
{
    public function updateProfile(Request $request,User $user)
    {
        /*$validate = Validator::make($request->all(), [
            'profile_picture'=>'nullable|mimes:jpg,png,jpeg|max:4000',
            'mobile_no'=> 'string|max:10'
        ]);*/

        // dd($request->all());

        $request->validate([
            'profile_picture'=>'nullable|mimes:jpg,png,jpeg|max:4000',
            'mobile_number'=> 'required|max:10'
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/users/'.$user->profile_picture)) {
            Storage::delete('public/users/'.$user->profile_picture);
            $user->profile_picture = null;
        }

        if ($request->hasFile('profile_picture')) {

            if (Storage::exists('public/users/'.$user->profile_picture)) {
                Storage::delete('public/users/'.$user->profile_picture);
            }

           $profile_picture_name = $request->file('profile_picture');
           $ext = $profile_picture_name->extension();
           $profile_picture_filename = uniqid().'.'.$ext;
           $profile_picture_name->storeAs('public/users/',$profile_picture_filename);
           $user->profile_picture = $profile_picture_filename;
        }
        $user->fill($request->except('profile_picture'));
        // $user->password = Hash::make($request->new_password);
        $result = $user->save();

        return redirect()->back()->with('success','Record has been updated successfully!!');
    }

    public function updatePassword(Request $request,User $user)
    {

        $request->validate([
            'current_password'=> 'required',
            'new_password' => 'required|string|min:6',
            'confirm_password'=> 'required|same:new_password',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
        }
        else{
            return redirect()->back()->with('error','Current password does not match!!');
        }
        $user->update();
        return redirect()->back()->with('success','Password has been updated successfully!!');
    }
}
