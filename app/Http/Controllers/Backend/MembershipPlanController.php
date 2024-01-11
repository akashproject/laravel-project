<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\MembershipPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MembershipPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membershipPlans = MembershipPlan::get();
        return view('backend.membership_plans.list',compact('membershipPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.membership_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:membership_plans,name',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'features' => 'required',
            'tenure' => 'required',
            'member_child_image.*'=>'nullable|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);

        // For Member Child Image
       if ($request->hasFile('member_child_image')) {
           foreach ($request->file('member_child_image') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $member_child_image_filename = $rand.".".$ext;
                $image->storeAs('public/membership_plans/',$member_child_image_filename);
                $member_child_image_files[] = $member_child_image_filename;
            }
       }
       // End Member Child Image

       $member_child_dataArr = [
            'member_child_title' => $request->member_child_title,
            'member_child_content' => $request->member_child_content,
            'member_child_image' => $member_child_image_files ?? null
        ];

        $membershipPlan = new MembershipPlan();
        $membershipPlan->fill($request->all());
        $membershipPlan->slug = Str::slug($request->name);
        $membershipPlan->member_child_data = json_encode($member_child_dataArr);
        $membershipPlan->save();

        return redirect()->back()->with('success','Record has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MembershipPlan $membershipPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MembershipPlan $membershipPlan)
    {
        $member_child_content = json_decode($membershipPlan->member_child_data);
        return view('backend.membership_plans.edit',compact('membershipPlan','member_child_content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MembershipPlan $membershipPlan)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:membership_plans,name,'.$membershipPlan->id,
            'description' => 'required|string',
            'price' => 'required|numeric',
            'features' => 'required',
            'tenure' => 'required',
            'member_child_image.*'=>'nullable|mimes:jpeg,png,jpg,svg,gif,max:4000',
        ]);
        $member_child_content = json_decode($membershipPlan->member_child_data);

        // For Member Child Image
       if ($request->hasFile('member_child_image')) {
           foreach ($request->file('member_child_image') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $member_child_image_filename = $rand.".".$ext;
                $image->storeAs('public/membership_plans/',$member_child_image_filename);
                $member_child_image_files[] = $member_child_image_filename;
            }
       }
       else{
            $member_child_image_files = $member_child_content->member_child_image ?? null;
       }
       // End Member Child Image

       $member_child_dataArr = [
            'member_child_title' => $request->member_child_title,
            'member_child_content' => $request->member_child_content,
            'member_child_image' => $member_child_image_files,
        ];
        $membershipPlan->fill($request->all());
        $membershipPlan->slug = Str::slug($request->name);
        $membershipPlan->member_child_data = json_encode($member_child_dataArr);
        $membershipPlan->save();

        return redirect()->back()->with('success','Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipPlan $membershipPlan)
    {
        $membershipPlan->delete();
        /*if (Storage::exists('public/membership_plans/'.$membershipPlan->image)) {
            Storage::delete('public/membership_plans/'.$membershipPlan->image);
        }*/
        return redirect()->back()->with('success','Record has been deleted successfully.');
    }

    public function status(Request $request)
    {
        try {
            $membershipPlan = MembershipPlan::findOrFail($request->id);
        } catch (\Exception $e) {
            return response()->json(['error' =>$e->getMessage()]);
            
        }
       

        /*if (($request->status == 'Active') || ($request->status == 'active')) {
             $membershipPlan->status = 'inactive';
        }
        else{
             $membershipPlan->status = 'active';
   
        }*/

        if ($membershipPlan->status == 'active') {
             $membershipPlan->status = 'inactive';
        }
        else{
             $membershipPlan->status = 'active';
   
        }

        $membershipPlan->update();
        return response()->json(['status' =>'Status has been updated successfully','plan' => $membershipPlan]);
    }
}
