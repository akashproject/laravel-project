<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('backend.team.list',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);
        $team = new Team;

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/teams/',$image_filename);
           $team->image = $image_filename;
        }
        $team->fill($request->except('image'));
        $team->save();
        return redirect()->back()->with('success','Record has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('backend.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/teams/'.$team->image)) {
            Storage::delete('public/teams/'.$team->image);
            $team->image = null;
        }

        if ($request->hasFile('image')) {

            if (Storage::exists('public/teams/'.$team->image)) {
                Storage::delete('public/teams/'.$team->image);
            }

           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/teams/',$image_filename);
           $team->image = $image_filename;
        }
        $team->fill($request->except('image'));
        $team->update();

        return redirect()->back()->with('success','Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();    
        if (Storage::exists('public/teams/'.$team->image)) {
            Storage::delete('public/teams/'.$team->image);
        }
        return redirect()->back()->with('success','Record has been deleted successfully.');
    }
}
