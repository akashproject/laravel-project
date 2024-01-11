<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.list',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banner.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'sub_title'=>'required|string|max:255',
            'banner'=>'required|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);
        $banner = new Banner;

        if ($request->hasFile('banner')) {
           $banner_name = $request->file('banner');
           $ext = $banner_name->extension();
           $banner_filename = uniqid().'.'.$ext;
           $banner_name->storeAs('public/banners/',$banner_filename);
           $banner_img = $banner_filename;
        }
        $banner->fill($request->except('banner'));
        $banner->slug = Str::slug($request->title);
        $banner->banner = $banner_img;
        $banner->save();

        return redirect()->back()->with('success','Record has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'sub_title'=>'required|string|max:255',
            'banner'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/banners/'.$banner->banner)) {
            Storage::delete('public/banners/'.$banner->banner);
            $banner->banner = null;
        }

        if ($request->hasFile('banner')) {

            if (Storage::exists('public/banners/'.$banner->banner)) {
                Storage::delete('public/banners/'.$banner->banner);
            }

           $banner_name = $request->file('banner');
           $ext = $banner_name->extension();
           $banner_filename = uniqid().'.'.$ext;
           $banner_name->storeAs('public/banners/',$banner_filename);
           $banner->banner = $banner_filename;
        }
        $banner->fill($request->except('banner'));
        $banner->slug = Str::slug($request->title);
        $banner->update();

        return redirect()->back()->with('success','Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        if (Storage::exists('public/banners/'.$banner->banner)) {
            Storage::delete('public/banners/'.$banner->banner);
        }
        return redirect()->back()->with('success','Record has been deleted successfully.');
    }
}
