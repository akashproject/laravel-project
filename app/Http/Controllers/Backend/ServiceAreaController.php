<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\ServiceArea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ServiceAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_areas = ServiceArea::all();
        return view('backend.service_area.list',compact('service_areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.service_area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:service_areas,name',
        ]);
        $serviceArea = new ServiceArea;
        $serviceArea->slug = Str::slug($request->name);
        $serviceArea->fill($request->all());
        $serviceArea->save();
        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceArea $serviceArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceArea $serviceArea)
    {
        return view('backend.service_area.edit',compact('serviceArea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceArea $serviceArea)
    {
        $request->validate([
            'name'=>'required|unique:service_areas,name,'.$serviceArea->id,
        ]);
        $serviceArea->slug = Str::slug($request->name);
        $serviceArea->fill($request->all());
        $serviceArea->save();
        return redirect()->back()->with('success',__('admin_messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceArea $serviceArea)
    {
        $serviceArea->delete();
        return redirect()->back()->with('success',__('admin_messages.deleted'));
    }
}
