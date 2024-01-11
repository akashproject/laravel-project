<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\MemberShip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class MemberShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = MemberShip::all();
        return view('backend.membership.list',compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member_ships = MemberShip::all();
        return view('backend.membership.create',compact('member_ships'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);
        $membership = new MemberShip;

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/memberships/',$image_filename);
           $membership->image = $image_filename;
        }
        $membership->fill($request->except('image'));
        $membership->slug = Str::slug($request->name);
        $membership->save();

        return redirect()->back()->with('success','Record has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberShip $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberShip $membership)
    {
        $member_ships = MemberShip::where('id','!=',$membership->id)->get();
        return view('backend.membership.edit',compact('membership','member_ships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberShip $membership)
    {
        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/programs/'.$membership->image)) {
            Storage::delete('public/memberships/'.$membership->image);
            $membership->image = null;
        }

        if ($request->hasFile('image')) {

            if (Storage::exists('public/memberships/'.$membership->image)) {
                Storage::delete('public/memberships/'.$membership->image);
            }

           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/memberships/',$image_filename);
           $membership->image = $image_filename;
        }
        $membership->fill($request->except('image'));
        $membership->slug = Str::slug($request->name);
        $membership->save();

        return redirect()->back()->with('success','Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberShip $membership)
    {
        $membership->delete();
        if (Storage::exists('public/memberships/'.$membership->image)) {
            Storage::delete('public/memberships/'.$membership->image);
        }

        return redirect()->back()->with('success','Record has been deleted successfully.');
    }
}
