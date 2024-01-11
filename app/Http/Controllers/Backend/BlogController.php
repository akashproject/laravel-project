<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\MembershipPlan;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.list',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membership_plans = MembershipPlan::where('status','active')->get();
        return view('backend.blog.create',compact('membership_plans'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $published_on = date('Y-m-d h:i:s',strtotime($request->published_on));
        $request->validate([
            'title'=>'required|string|max:225|unique:blogs,title',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'aurthor_name'=>'required|string|max:255',
            'aurthor_image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'published_on'=>'nullable|date_format:Y-m-d'
        ]);
        $blog = new Blog;

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/blogs/',$image_filename);
           $blog->image = $image_filename;
        }
        if ($request->hasFile('aurthor_image')) {
           $aurthor_image = $request->file('aurthor_image');
           $ext = $aurthor_image->extension();
           $aurthor_image_filename = uniqid().'.'.$ext;
           $aurthor_image->storeAs('public/blogs/',$aurthor_image_filename);
           $blog->aurthor_image = $aurthor_image_filename;
        }
        $blog->fill($request->except('image','published_on','aurthor_image'));
        $blog->slug = Str::slug($request->title);
        $blog->published_on = $published_on;
        $blog->save();
        return redirect()->back()->with('success',__('admin_messages.created'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $membership_plans = MembershipPlan::where('status','active')->get();
        return view('backend.blog.edit',compact('blog','membership_plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $published_on = date('Y-m-d h:i:s',strtotime($request->published_on));

        $request->validate([
            'title'=>'required|string|max:255|unique:blogs,title,'.$blog->id,
            'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'aurthor_name'=>'required|string|max:255',
            'aurthor_image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'published_on'=>'nullable|date_format:Y-m-d'
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/blogs/'.$blog->image)) {
            Storage::delete('public/blogs/'.$blog->image);
            $blog->image = null;
        }
        if ($request->rmv_exist_aurthor_image == 1 && Storage::exists('public/blogs/'.$blog->aurthor_image)) {
            Storage::delete('public/blogs/'.$blog->aurthor_image);
            $blog->aurthor_image = null;
        }

        if ($request->hasFile('image')) {

            if (Storage::exists('public/blogs/'.$blog->image)) {
                Storage::delete('public/blogs/'.$blog->image);
            }

           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/blogs/',$image_filename);
           $blog->image = $image_filename;
        }
        if ($request->hasFile('aurthor_image')) {

            if (Storage::exists('public/blogs/'.$blog->aurthor_image)) {
                Storage::delete('public/blogs/'.$blog->aurthor_image);
            }

           $aurthor_image = $request->file('aurthor_image');
           $ext = $aurthor_image->extension();
           $aurthor_image_filename = uniqid().'.'.$ext;
           $aurthor_image->storeAs('public/blogs/',$aurthor_image_filename);
           $blog->aurthor_image = $aurthor_image_filename;
        }
        $blog->fill($request->except('image','published_on','aurthor_image'));
        $blog->slug = Str::slug($request->title);
        $blog->published_on = $published_on;
        $blog->update();

        return redirect()->back()->with('success',__('admin_messages.updated'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        if (Storage::exists('public/blogs/'.$blog->image)) {
            Storage::delete('public/blogs/'.$blog->image);
        }
        if (Storage::exists('public/blogs/'.$blog->aurthor_image)) {
            Storage::delete('public/blogs/'.$blog->aurthor_image);
        }
        return redirect()->back()->with('success',__('admin_messages.deleted'));

    }
}
