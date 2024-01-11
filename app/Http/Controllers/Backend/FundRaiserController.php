<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\FundRaiser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// FundRaiser $fundRaiser

class FundRaiserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fund_raisers = FundRaiser::all();
        return view('backend.fund_raiser.list',compact('fund_raisers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.fund_raiser.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        $fundRaiser = new FundRaiser;

        if ($request->hasFile('icon')) {
           $icon = $request->file('icon');
           $ext = $icon->extension();
           $icon_filename = uniqid().'.'.$ext;
           $icon->storeAs('public/fund_raisers/',$icon_filename);
           $fundRaiser->icon = $icon_filename;
        }
        $fundRaiser->fill($request->except('icon'));
        $fundRaiser->save();

        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FundRaiser $fundRaiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FundRaiser $fundRaiser)
    {
        return view('backend.fund_raiser.edit',compact('fundRaiser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FundRaiser $fundRaiser)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/fund_raisers/'.$fundRaiser->icon)) {
            Storage::delete('public/core_values/'.$fundRaiser->icon);
            $fundRaiser->icon = null;
        }

        if ($request->hasFile('icon')) {

            if (Storage::exists('public/fund_raisers/'.$fundRaiser->icon)) {
                Storage::delete('public/fund_raisers/'.$fundRaiser->icon);
            }

           $icon = $request->file('icon');
           $ext = $icon->extension();
           $icon_filename = uniqid().'.'.$ext;
           $icon->storeAs('public/fund_raisers/',$icon_filename);
           $fundRaiser->icon = $icon_filename;
        }
        $fundRaiser->fill($request->except('icon'));
        $fundRaiser->save();

        return redirect()->back()->with('success',__('admin_messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundRaiser $fundRaiser)
    {
        if (Storage::exists('public/fund_raisers/'.$fundRaiser->icon)) {
            Storage::delete('public/fund_raisers/'.$fundRaiser->icon);
        }
        $fundRaiser->delete();
        return redirect()->back()->with('success',__('admin_messages.deleted'));
    }
}
