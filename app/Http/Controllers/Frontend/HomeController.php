<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Page,Banner,Team,CoreValue,Program,MembershipPlan,Event,Blog,Faq,Donation,Widget};
use URL;

class HomeController extends Controller
{
    public function index(){
        $page = Page::where('slug','home')->first();
        $home_content = json_decode($page->content);

        // For Banner
        $banners = [];
        if (isset($home_content->banner_slider_id) && count($home_content->banner_slider_id) > 0) {
            $banners = Banner::whereIn('id',$home_content->banner_slider_id)->orderByDesc('created_at')->get();
        }

        // For Team
        $teams = [];
        if (isset($home_content->team_id) && count($home_content->team_id) > 0) {
            $teams = Team::whereIn('id',$home_content->team_id)->orderByDesc('created_at')->take(3)->get();
        }

        // For CoreValue
        $core_values = [];
        if (isset($home_content->core_value_id) && count($home_content->core_value_id) > 0) {
            $core_values = CoreValue::whereIn('id',$home_content->core_value_id)->orderByDesc('created_at')->get();
        }

        // For Program
        $programs = [];
        if (isset($home_content->program_id) && count($home_content->program_id) > 0) {
            $programs = Program::whereIn('id',$home_content->program_id)->orderByDesc('created_at')->get();
        }
        

        // For MembershipBenefits
        $member_benefits = [];
        if (isset($home_content->member_benefit_id) && count($home_content->member_benefit_id) > 0) {
            $member_benefits = MembershipPlan::whereIn('id',$home_content->member_benefit_id)->get();
        }

        // For MembershipPlan
        $membership_plans = [];
        if (isset($home_content->membership_plan_id) > 0 && count($home_content->membership_plan_id) > 0) {
            $membership_plans = MembershipPlan::whereIn('id',$home_content->membership_plan_id)->get();
        }

        // For Event
        $events = [];
        if (isset($home_content->event_id) && count($home_content->event_id) > 0) {
            $events = Event::whereIn('id',$home_content->event_id)->orderByDesc('created_at')->take(3)->get();
        }

        // For Blogs
        $blogs = [];
        if (isset($home_content->blog_id) && count($home_content->blog_id) > 0) {
            $blogs = Blog::whereIn('id',$home_content->blog_id)->orderByDesc('created_at')->get();
        }

        // For Faqs
        $faqs = [];
        if (isset($home_content->faq_id) && count($home_content->faq_id) > 0) {
            $faqs = Faq::whereIn('id',$home_content->faq_id)->orderByDesc('created_at')->get();
        }
        
        // dd($teams);
        // dd(gettype($faqs));
        // dd(gettype($banners));
        return view('frontend.home',compact('page','home_content','banners','teams','core_values','programs','member_benefits','membership_plans','events','blogs','faqs'));
    }

    public function showReferMember(){
        return view('frontend.refer-member');
    }

    public function searchMemberToRefer(Request $request){

       /* $request->validate([
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ],
        [
            'password' => "Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."
        ]
    );*/
        // dd("good");
        /*User::where('first_name',$request->first_name)
        ->where('last_name',$request->last_name)
        ->where('city',$request->location)
        ->where('mobile_number',$request->mobile_number)
        ->where('email',$request->email)
        ->first();*/


       $user = User::where('email',$request->email)->first();
       
       $requestData = [
          'fullname' => $request->first_name.' '.$request->last_name,
          'email' => $request->email
       ];

        if(!empty($user)){
            return redirect()->back()->with("error","You are already a member!");
        }
        else{
            return view('frontend.member-result',compact('requestData'));
        }
    }

    public function sendReferMemberMail(Request $request){

        $user = auth()->user();
        $url = URL::to('/');

        if (!empty($request->fullname) && !empty($request->email)) {

            $userAvailable = User::where('email',$request->email)->first();
            if (!$userAvailable) {
                $register_url = $url.'/register?ref='.$user->email.'&'.'u='.$request->email;
                $mailArrayData = [
                    'url' => $register_url,
                    'email' => $request->email,
                    'fullname' => $request->fullname,
                    'user_name' => $user->first_name.' '.$user->last_name
                ];

                \Mail::to($request->email)->queue(new \App\Mail\ReferMember($mailArrayData));
                return redirect()->route('refer-member')->with('success','Mail send successfully');
            }
            else{
                return redirect()->route('refer-member')->with('error','User already exists');
            }
        }
    }

    /*public function blogList($value='')
    {
        return view('frontend.listing.blog-list');
    }
    */

    public function eventDetails($slug){
        $widget = Widget::whereSlug('event-details')->first();
        $event = Event::whereSlug($slug)->first();
        if (is_null($event)) {
            abort(404,'Page Not Found!!!');
        }
        return view('frontend.event-details',compact('widget','event'));
    }

    public function programDetails($slug){
        $widget = Widget::whereSlug('program-details')->first();
        $program = Program::whereSlug($slug)->first();
        if (is_null($program)) {
            abort(404,'Page Not Found!!!');
        }
        return view('frontend.program-details',compact('widget','program'));
    }
}
