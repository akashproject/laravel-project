<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Program;
use App\Models\{User,MembershipPlan};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        return view('backend.program.list',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member_ships = MembershipPlan::where('status','active')->get();
        // $users = User::where('role_id','!=',1)->get();
        return view('backend.program.create',compact('member_ships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $from_date = date('h:i a',strtotime($request->from_date));
        $to_date = date('h:i a',strtotime($request->to_date));
        $program_date = date('Y-m-d',strtotime($request->program_date));
        $request->validate(
            [
                'title'=>'required|string|max:255|unique:programs,title',
                'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
                'membership_plan_id'=>'required|array',
                'organizer_name'=>'required|string|max:255',
                'program_date'=>'required|date_format:Y-m-d',

                'location'=>'required|string|max:255',
                'program_type'=>'required|string|max:255',
                'price'=>'required_if:program_type,==,Paid Program',
                'num_of_seat'=>'required|numeric',
            ],
            [
                'membership_plan_id'=>'The membership field is required',
                'num_of_seat'=>'The number of seat field is required',
                'event_type'=>'The event type field is required'
            ]
        );
        $program = new Program;

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/programs/',$image_filename);
           $program->image = $image_filename;
        }
        $program->fill($request->except('image','from_date','to_date'));

        $program->slug = Str::slug($request->title);
        $program->from_date = $from_date;
        $program->to_date = $to_date;
        $program->program_date = $program_date;
        // $program->user_id = auth()->id();
        if ($request->is_guest) {
            $program->is_guest = 1;
        }
        $program->save();
        $membership_plan = MembershipPlan::find($request->membership_plan_id);
        $member_payment_type = $request->member_payment_type;

        foreach ($membership_plan as $key => $membership_plan_id) {
            $program->memberships()->attach($membership_plan_id,[
                'member_payment_type' => $member_payment_type[$key]
            ]);
        }

        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $member_ships = MembershipPlan::where('status','active')->get();
        $memberships = $program->memberships;
        $memberships_id_arr = [];
        foreach ($memberships as $item) {
            array_push($memberships_id_arr,$item->id);
        }
        return view('backend.program.edit',compact('program','member_ships','memberships_id_arr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $from_date = date('h:i A',strtotime($request->from_date));
        $to_date = date('h:i A',strtotime($request->to_date));
        $program_date = date('Y-m-d',strtotime($request->program_date));

        $request->validate([
            'title'=>'required|string|max:255|unique:programs,title,'.$program->id,
            'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            'membership_plan_id'=>'required|array',
            'organizer_name'=>'required|string|max:255',
            /*'from_date'=>'required|date_format:Y-m-d',
            'to_date'=>'required|date_format:Y-m-d',*/
            'program_date'=>'required|date_format:Y-m-d',
            'location'=>'required|string|max:255',
            'program_type'=>'required|string|max:255',
            'price'=>'required_if:program_type,==,Paid Program',
            'num_of_seat'=>'required|numeric',
        ]);

        if ($request->rmv_exist_image == 1 && Storage::exists('public/programs/'.$program->image)) {
            Storage::delete('public/programs/'.$program->image);
            $program->image = null;
        }

        if ($request->hasFile('image')) {
            if (Storage::exists('public/programs/'.$program->image)) {
                Storage::delete('public/programs/'.$program->image);
            }
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/programs/',$image_filename);
           $program->image = $image_filename;
        }
        $program->fill($request->except('image','from_date','to_date'));

        $program->slug = Str::slug($request->title);
        $program->from_date = $from_date;
        $program->to_date = $to_date;
        $program->program_date = $program_date;
        if ($request->is_guest) {
            $program->is_guest = 1;
        }
        $program->save();

        /*$membership_plan = MembershipPlan::find($request->membership_plan_id);
        $member_payment_type = $request->member_payment_type;*/

        // foreach ($membership_plan_ids as $key => $membership_plan_id) {
        //     /*$program->memberships()->sync($membership_plan_ids,[
        //         'member_payment_type' => $member_payment_types[$key]
        //     ]);*/
        //     $program->memberships()->updateExistingPivot($membership_plan_id,[
        //         'member_payment_type' => $member_payment_types[$key]
        //     ]);
        // }

        $membership_plan_ids = $request->membership_plan_id;
        $member_payment_types = $request->member_payment_type;

        foreach ($membership_plan_ids as $key => $membership_plan_id) {
            $pivotData = [
                'member_payment_type' => $member_payment_types[$key]
            ];
            $program->memberships()->syncWithoutDetaching([$membership_plan_id => $pivotData]);
        }

        return redirect()->back()->with('success',__('admin_messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->users()->detach();
        $program->delete();
        if (Storage::exists('public/programs/'.$program->image)) {
            Storage::delete('public/programs/'.$program->image);
        }
        return redirect()->back()->with('success','Record has been deleted successfully.');
    }
}
