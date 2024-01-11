<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Widget;
use Illuminate\Http\Request;
use Storage,Str;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $widgets = Widget::all();
        return view('backend.widget.list',compact('widgets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.widget.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255|unique:widgets,name',
            'bread_crumb_title'=>'required|string|max:255',
            'banner'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'bread_crumb_content'=>'nullable|string|max:5000',
        ]);
        $widget = new Widget;

        if ($request->hasFile('banner')) {
           $banner = $request->file('banner');
           $ext = $banner->extension();
           $banner_filename = uniqid().'.'.$ext;
           $banner->storeAs('public/widgets/',$banner_filename);
           $widget->banner = $banner_filename;
        }
        $widget->fill($request->except('banner'));
        $widget->slug = Str::slug($request->name);
        $widget->save();

        return redirect()->back()->with('success','Record has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Widget $widget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Widget $widget)
    {
        return view('backend.widget.edit',compact('widget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Widget $widget)
    {
        $request->validate([
            'name'=>'required|string|max:255|unique:widgets,name,'.$widget->id,
            'bread_crumb_title'=>'required|string|max:255',
            'banner'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'bread_crumb_content'=>'nullable|string|max:5000',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/widgets/'.$widget->banner)) {
            Storage::delete('public/widgets/'.$widget->banner);
            $widget->banner = null;
        }

        if ($request->hasFile('banner')) {

            if (Storage::exists('public/widgets/'.$widget->banner)) {
                Storage::delete('public/widgets/'.$widget->banner);
            }

           $banner = $request->file('banner');
           $ext = $banner->extension();
           $banner_filename = uniqid().'.'.$ext;
           $banner->storeAs('public/widgets/',$banner_filename);
           $widget->banner = $banner_filename;
        }
        $widget->fill($request->all());
        $widget->slug = Str::slug($request->name);
        $widget->update();

        return redirect()->back()->with('success','Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Widget $widget)
    {
        $widget->delete();
        if (Storage::exists('public/widgets/'.$widget->banner)) {
            Storage::delete('public/widgets/'.$widget->banner);
        }
        return redirect()->back()->with('success','Record has been deleted successfully.');
    }
}
