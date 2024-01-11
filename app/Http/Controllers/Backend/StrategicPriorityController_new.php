<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\StrategicPriority;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// StrategicPriority $strategicPriority

class StrategicPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strategic_priorities = StrategicPriority::all();
     
        return view('backend.strategic_priority.list',compact('strategic_priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.strategic_priority.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:strategic_priorities,title',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        $strategicPriority = new StrategicPriority;

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/strategic_priorities/',$image_filename);
           $strategicPriority->image = $image_filename;
        }
        $strategicPriority->fill($request->except('image','content'));
        $strategicPriority->slug = Str::slug($request->title);

        $arrData = [
            'sub_title_1' => $request->sub_title_1,
            'content_1' => $request->content_1,
            'sub_title_2' => $request->sub_title_2,
            'content_2' => $request->content_2,
        ];
        $strategicPriority->content = json_encode($arrData);
        $strategicPriority->save();

        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(StrategicPriority $strategicPriority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrategicPriority $strategicPriority)
    {
        // $content = [];
        $content = json_decode($strategicPriority->content);
        // dd($content->sub_title_1);
        // dd(json_decode($strategicPriority->content));
        return view('backend.strategic_priority.edit',compact('strategicPriority','content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrategicPriority $strategicPriority)
    {


        $request->validate([
            'title' => 'required|string|max:255|unique:strategic_priorities,title,'.$strategicPriority->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/strategic_priorities/'.$strategicPriority->image)) {
            Storage::delete('public/strategic_priorities/'.$strategicPriority->image);
            $strategicPriority->image = null;
        }


        if ($request->hasFile('image')) {

            if (Storage::exists('public/strategic_priorities/'.$strategicPriority->image)) {
                Storage::delete('public/strategic_priorities/'.$strategicPriority->image);
            }

           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/strategic_priorities/',$image_filename);
           $strategicPriority->image = $image_filename;
        }
        $strategicPriority->fill($request->except('image','content'));
        $strategicPriority->slug = Str::slug($request->title);

        $arrData = [
            'sub_title_1' => $request->sub_title_1,
            'content_1' => $request->content_1,
            'sub_title_2' => $request->sub_title_2,
            'content_2' => $request->content_2,
        ];
        $strategicPriority->content = json_encode($arrData);
        $strategicPriority->save();



        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrategicPriority $strategicPriority)
    {
        if (Storage::exists('public/strategic_priorities/'.$strategicPriority->image)) {
            Storage::delete('public/strategic_priorities/'.$strategicPriority->image);
        }
        $strategicPriority->delete();
        return redirect()->back()->with('success',__('admin_messages.updated'));
    }
}
