<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $core_values = CoreValue::all();
        return view('backend.core_value.list',compact('core_values'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.core_value.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'content' => 'required|string|max:5000',
        ]);

        $coreValue = new CoreValue;

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/core_values/',$image_filename);
           $coreValue->image = $image_filename;
        }
        $coreValue->fill($request->except('image'));
        $coreValue->slug = Str::slug($request->title);
        $coreValue->save();

        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CoreValue $coreValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoreValue $coreValue)
    {
        return view('backend.core_value.edit',compact('coreValue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoreValue $coreValue)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'content' => 'required|string|max:5000',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/programs/'.$coreValue->image)) {
            Storage::delete('public/core_values/'.$coreValue->image);
            $coreValue->image = null;
        }

        if ($request->hasFile('image')) {

            if (Storage::exists('public/core_values/'.$coreValue->image)) {
                Storage::delete('public/core_values/'.$coreValue->image);
            }

           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/core_values/',$image_filename);
           $coreValue->image = $image_filename;
        }
        $coreValue->fill($request->except('image'));
        $coreValue->slug = Str::slug($request->title);
        $coreValue->save();

        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoreValue $coreValue)
    {
        if (Storage::exists('public/core_values/'.$coreValue->image)) {
            Storage::delete('public/core_values/'.$coreValue->image);
        }
        $coreValue->delete();
        return redirect()->back()->with('success',__('admin_messages.deleted'));
    }
}
