<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Page,Blog,Program,Event,MembershipPlan};

class FrontPageController extends Controller
{
    public function showDynamicPages(Request $request, $slug='')
    {
        $page = Page::where('slug',$slug)->first();
        if (is_null($page) || $page->slug == 'home') {
            abort(404, 'Page Not Found');
        }

        $page_content = json_decode($page->content);

        // For Blogs
        $blogs = [];
        if (isset($page_content->blog_list_id) && count($page_content->blog_list_id) > 0) {
            $blogs = Blog::whereIn('id',$page_content->blog_list_id)->orderByDesc('created_at')->get();
        }

        $programs = Program::orderBy('created_at')->get();
        $events = Event::orderBy('created_at')->get();
        $member_types = MembershipPlan::where('status','active')->get();

        /*======= Start for filter Event ========*/


        /*========= Start filteration Events ===========*/
        $query = Event::from('events');
        $query->when($request->member_type ?? false, function ($query, $value) {
            $query->whereHas('memberships', function ($query) use ($value) {
                $query->where('membership_plans.slug', $value)
                    ->where('member_payment_type', '!=', 'Not Allowed');
            });
        })
        ->when($request->event_type ?? false, function ($query, $value) {
            $query->where('events.event_type', $value);
        })
        ->when($request->event_date ?? false, function($query) use ($request){
            // Assuming $request->event_date is in the format 'Y-m-d'
            $formatted_date = date('Y-m-d', strtotime($request->event_date));
            $query->whereDate('events.event_date', '=', $formatted_date);
        })
        ->when($request->search_event ?? false, function($query, $value){
            $query->where('events.title','LIKE',"%$value%");
        });
        $events = $query->get();

        $data['selected_member_type'] = $request->member_type ?? '';
        $data['selected_event_type'] = $request->event_type ?? '';
        $data['selected_event_date'] = $request->event_date ?? '';
        $data['selected_search_event'] = $request->search_event ?? '';

        /*====== End filteration Events =================*/


        /*========= Start filteration Programs ===========*/
        $query = Program::from('programs');
        $query->when($request->member_type ?? false, function ($query, $value) {
            $query->whereHas('memberships', function ($query) use ($value) {
                $query->where('membership_plans.slug', $value)
                    ->where('member_payment_type', '!=', 'Not Allowed');
            });
        })
        ->when($request->program_type ?? false, function ($query, $value) {
            $query->where('programs.program_type', $value);
        })
        ->when($request->program_date ?? false, function($query) use ($request){
            // Assuming $request->program_date is in the format 'Y-m-d'
            $formatted_date = date('Y-m-d', strtotime($request->program_date));
            $query->whereDate('programs.program_date', '=', $formatted_date);
        })
        ->when($request->search_program ?? false, function($query, $value){
            $query->where('programs.title','LIKE',"%$value%");
        });
        $programs = $query->get();

        /*$prog = Program::find(2);
        dd($prog->memberships[0]->name);*/

        /*$membership = MembershipPlan::first();
        dd($membership->events[0]->pivot->member_payment_type);*/   



        $data['selected_member_type'] = $request->member_type ?? '';
        $data['selected_program_type'] = $request->program_type ?? '';
        $data['selected_program_date'] = $request->program_date ?? '';
        $data['selected_search_program'] = $request->search_program ?? '';

        /*====== End filteration Programs =================*/

        // dd($page_content);
        // dd($page);
        return view('frontend.cms.dynamic-page',compact('page','page_content','blogs','programs','events','member_types'))->with($data);
    }
}
