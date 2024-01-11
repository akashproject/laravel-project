<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\MembershipPlan;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('backend.event.list',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(auth()->user()->id);
        $member_ships = MembershipPlan::where('status','active')->get();
        $users = User::all(); // for future
        return view('backend.event.create',compact('member_ships','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->member_payment_type);
        // dd(gettype($request->member_payment_type));

        $from_date = date('h:i A',strtotime($request->from_date));
        $to_date = date('h:i A',strtotime($request->to_date));
        $event_date = date('Y-m-d',strtotime($request->event_date));

        $request->validate(
            [
                'title'=>'required|string|max:255|unique:events,title',
                'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
                'membership_plan_id'=>'required|array',
                'organizer_name'=>'required|string|max:255',
                'event_date'=>'required|date_format:Y-m-d',
                'location'=>'required|string|max:255',
                'event_type'=>'required|string|max:255',
                'price'=>'required_if:event_type,==,Paid Event',
                'num_of_seat'=>'required|numeric',
            ],
            [
                'membership_plan_id'=>'The membership field is required',
                'num_of_seat'=>'The number of seat field is required',
                'event_type'=>'The event type field is required'
            ]
        );

        $event = new Event;

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/events/',$image_filename);
           $event->image = $image_filename;
        }
        
        $event->fill($request->except('image','from_date','to_date'));
        $event->slug = Str::slug($request->title);
        $event->from_date = $from_date;
        $event->to_date = $to_date;
        $event->event_date = $event_date;

        if ($request->is_guest) {
            $event->is_guest = 1;
        }
        $event->save();
        $membership_plan = MembershipPlan::find($request->membership_plan_id);
        $member_payment_type = $request->member_payment_type;

        foreach ($membership_plan as $key => $membership_plan_id) {
            $event->memberships()->attach($membership_plan_id,[
                'member_payment_type' => $member_payment_type[$key]
            ]);
        }
        
        return redirect()->back()->with('success',__('admin_messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $member_ships = MembershipPlan::where('status','active')->get();
        $memberships = $event->memberships;
        $memberships_id_arr = [];
        foreach ($memberships as $item) {
            array_push($memberships_id_arr,$item->id);
        }
        return view('backend.event.edit',compact('event','member_ships','memberships_id_arr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $from_date = date('h:i A',strtotime($request->from_date));
        $to_date = date('h:i A',strtotime($request->to_date));
        $event_date = date('Y-m-d',strtotime($request->event_date));

        $request->validate(
            [
                'title'=>'required|string|max:255|unique:events,title,'.$event->id,
                'image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
                'membership_plan_id'=>'required|array',
                'organizer_name'=>'required|string|max:255',
                'event_date'=>'required|date_format:Y-m-d',
                'location'=>'required|string|max:255',
                'event_type'=>'required|string|max:255',
                'price'=>'required_if:event_type,==,Paid Event',
                'num_of_seat'=>'required|numeric',
            ],
            [
                'membership_plan_id'=>'The membership field is required',
                'num_of_seat'=>'The number of seat field is required',
            ]
        );

        if ($request->rmv_exist_image == 1 && Storage::exists('public/events/'.$event->image)) {
            Storage::delete('public/events/'.$event->image);
            $event->image = null;
        }

        if ($request->hasFile('image')) {

            if (Storage::exists('public/events/'.$event->image)) {
                Storage::delete('public/events/'.$event->image);
            }

           $image = $request->file('image');
           $ext = $image->extension();
           $image_filename = uniqid().'.'.$ext;
           $image->storeAs('public/events/',$image_filename);
           $event->image = $image_filename;
        }
        $event->fill($request->except('image','from_date','to_date','price'));
        $event->slug = Str::slug($request->title);
        $event->from_date = $from_date;
        $event->to_date = $to_date;
        $event->event_date = $event_date;
        $event->price = null;
        if ($request->event_type == 'Paid Event') {
            $event->price = $request->price;
        }

        if ($request->is_guest) {
            $event->is_guest = 1;
        }
        $event->save();

        /*$membership_plan = MembershipPlan::find($request->membership_plan_id);
        $member_payment_type = $request->member_payment_type;*/

        $membership_plan_ids = $request->membership_plan_id;
        $member_payment_types = $request->member_payment_type;

        foreach ($membership_plan_ids as $key => $membership_plan_id) {
            $pivotData = [
                'member_payment_type' => $member_payment_types[$key]
            ];
            $event->memberships()->syncWithoutDetaching([$membership_plan_id => $pivotData]);
        }

        return redirect()->back()->with('success',__('admin_messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->memberships()->detach();
        $event->delete();
        if (Storage::exists('public/events/'.$event->image)) {
            Storage::delete('public/events/'.$event->image);
        }
        return redirect()->back()->with('success','Record has been deleted successfully.');
    }
}
