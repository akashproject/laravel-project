<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Page,Banner,Team,MembershipPlan,CoreValue,Program,Blog,Event,StrategicPriority,FundRaiser,Faq};
use Storage,Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        return view('backend.page.list',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner_sliders = Banner::get();
        $teams = Team::get();
        $membership_plans = MembershipPlan::get();
        $core_values = CoreValue::get();
        $programs = Program::get();
        $events = Event::get();
        $blogs = Blog::get();
        $faqs = Faq::get();
        $strategic_priorities = StrategicPriority::get();
        $fund_raisers = FundRaiser::get();

        return view('backend.page.create',compact('banner_sliders','teams','membership_plans','core_values','programs','events','blogs','faqs','strategic_priorities','fund_raisers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|unique:pages,title',
            'resource_video' => 'mimes:mp4,mov,ogg,qt|max:20000'
        ]);

        $page = new Page();
        $page->fill($request->except('banner'));
        $page->slug = Str::slug($request->title);

        if ($request->hasFile('banner')) {
           $banner_name = $request->file('banner');
           $ext = $banner_name->extension();
           $banner_filename = uniqid().'.'.$ext;
           $banner_name->storeAs('public/pages/',$banner_filename);
           $page->banner = $banner_filename;
        }

       // For about page
       if ($request->hasFile('about_who_we_banner')) {
           foreach ($request->file('about_who_we_banner') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $about_who_we_banner_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$about_who_we_banner_filename);
                $about_who_we_banner_files[] = $about_who_we_banner_filename;
            }
       }

       if ($request->hasFile('about_who_we_image_1')) {
           $about_who_we_image_1_name = $request->file('about_who_we_image_1');
           $ext = $about_who_we_image_1_name->extension();
           $about_who_we_image_1_filename = uniqid().'.'.$ext;
           $about_who_we_image_1_name->storeAs('public/pages/',$about_who_we_image_1_filename);
           $about_who_we_image_1 = $about_who_we_image_1_filename;
        }

        if ($request->hasFile('about_who_we_image_2')) {
           $about_who_we_image_2_name = $request->file('about_who_we_image_2');
           $ext = $about_who_we_image_2_name->extension();
           $about_who_we_image_2_filename = uniqid().'.'.$ext;
           $about_who_we_image_2_name->storeAs('public/pages/',$about_who_we_image_2_filename);
           $about_who_we_image_2 = $about_who_we_image_2_filename;
        }

        // End About Page


       // For Resource page
       if ($request->hasFile('resource_video_image')) {
           foreach ($request->file('resource_video_image') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_video_image_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_video_image_filename);
                $resource_video_image_files[] = $resource_video_image_filename;
            }
       }


       if ($request->hasFile('resource_video')) {
           foreach ($request->file('resource_video') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_video_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_video_filename);
                $resource_video_files[] = $resource_video_filename;
            }
       }


       if ($request->hasFile('resource_policy_doc_icon')) {
           foreach ($request->file('resource_policy_doc_icon') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_policy_doc_icon_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_policy_doc_icon_filename);
                $resource_policy_doc_icon_files[] = $resource_policy_doc_icon_filename;
            }
       }


       if ($request->hasFile('resource_policy_doc')) {
           foreach ($request->file('resource_policy_doc') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_policy_doc_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_policy_doc_filename);
                $resource_policy_doc_files[] = $resource_policy_doc_filename;
            }
       }


       if ($request->hasFile('resource_story_image')) {
           foreach ($request->file('resource_story_image') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_story_image_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_story_image_filename);
                $resource_story_image_files[] = $resource_story_image_filename;
            }
       }
       // End Resource page

       // Start Donation Page
       if ($request->hasFile('donation_who_we_image_1')) {
           $donation_who_we_image_1_name = $request->file('donation_who_we_image_1');
           $ext = $donation_who_we_image_1_name->extension();
           $donation_who_we_image_1_filename = uniqid().'.'.$ext;
           $donation_who_we_image_1_name->storeAs('public/pages/',$donation_who_we_image_1_filename);
           $donation_who_we_image_1 = $donation_who_we_image_1_filename;
        }

        if ($request->hasFile('donation_who_we_image_2')) {
           $donation_who_we_image_2_name = $request->file('donation_who_we_image_2');
           $ext = $donation_who_we_image_2_name->extension();
           $donation_who_we_image_2_filename = uniqid().'.'.$ext;
           $donation_who_we_image_2_name->storeAs('public/pages/',$donation_who_we_image_2_filename);
           $donation_who_we_image_2 = $donation_who_we_image_2_filename;
        }
        // End Donation Page

        // Start Leadership Registration Page
        if ($request->hasFile('registration_image')) {
           $registration_image_name = $request->file('registration_image');
           $ext = $registration_image_name->extension();
           $registration_image_filename = uniqid().'.'.$ext;
           $registration_image_name->storeAs('public/pages/',$registration_image_filename);
           $registration_image = $registration_image_filename;
        }
       // End Leadership Registration Page
        
        $page_sections = [
            /******* Start Home Page Section *******/
            'page_content' => $request->page_content,
            'banner_slider_id'=> $request->banner_slider_id,

            'who_we_title'=> $request->who_we_title,
            'who_we_subtitle'=> $request->who_we_subtitle,
            'who_we_content_title_1'=> $request->who_we_content_title_1,
            'who_we_content_1'=> $request->who_we_content_1,
            'who_we_content_title_2'=> $request->who_we_content_title_2,
            'who_we_content_2'=> $request->who_we_content_2,
            'team_id'=> $request->team_id,

            'core_value_title'=> $request->core_value_title,
            'core_value_subtitle'=> $request->core_value_subtitle,
            'core_value_content'=> $request->core_value_content,
            'core_value_id'=> $request->core_value_id,

            'program_title'=> $request->program_title,
            'program_subtitle'=> $request->program_subtitle,
            'program_id'=> $request->program_id,

            'member_title'=> $request->member_title,
            'member_subtitle'=> $request->member_subtitle,
            'member_content'=> $request->member_content,
            'member_benefit_id'=> $request->member_benefit_id,

            'membership_title'=> $request->membership_title,
            'membership_subtitle'=> $request->membership_subtitle,
            'membership_content'=> $request->membership_content,
            'membership_plan_id'=> $request->membership_plan_id,

            'event_title'=> $request->event_title,
            'event_subtitle'=> $request->event_subtitle,
            'event_id'=> $request->event_id,

            'donation_title'=> $request->donation_title,
            'donation_subtitle'=> $request->donation_subtitle,
            'donation_content'=> $request->donation_content,
            'donation_btn_label'=> $request->donation_btn_label,
            'donation_btn_url'=> $request->donation_btn_url,

            'blog_title'=> $request->blog_title,
            'blog_subtitle'=> $request->blog_subtitle,
            'blog_id'=> $request->blog_id,

            'faq_title'=> $request->faq_title,
            'faq_subtitle'=> $request->faq_subtitle,
            'faq_content'=> $request->faq_content,
            'faq_id'=> $request->faq_id,
             /******* End Home Page Section *******/

             /******* Start About Page Section *******/
            'about_banner_bread_crumb_title' => $request->about_banner_bread_crumb_title,
            'about_banner_subtitle' => $request->about_banner_subtitle,
            'about_banner_content' => $request->about_banner_content,

            // here multiplse image should upload
            'about_who_we_banner' => $about_who_we_banner_files ?? null,

            'about_who_we_title' => $request->about_who_we_title,
            'about_who_we_subtitle' => $request->about_who_we_subtitle,
            'about_who_we_content' => $request->about_who_we_content,

            'about_who_we_image_1' => $about_who_we_image_1 ?? null,
            'about_who_we_image_title_1' => $request->about_who_we_image_title_1,
            'about_who_we_image_content_1' => $request->about_who_we_image_content_1,

            'about_who_we_image_2' => $about_who_we_image_2 ?? null,
            'about_who_we_image_title_2' => $request->about_who_we_image_title_2,
            'about_who_we_image_content_2' => $request->about_who_we_image_content_2,

            
            'about_strategic_title' => $request->about_strategic_title,
            'about_strategic_subtitle' => $request->about_strategic_subtitle,
            'strategic_priority_id' => $request->strategic_priority_id,

            'about_fund_raiser_title' => $request->about_fund_raiser_title,
            'about_fund_raiser_subtitle' => $request->about_fund_raiser_subtitle,
            'about_fund_raiser_content' => $request->about_fund_raiser_content,
            'fund_raiser_id' => $request->fund_raiser_id,
            /******* End About Page Section *******/

            /******* Start Contact Us Page Section *******/
            'contact_title' => $request->contact_title,
            'contact_subtitle' => $request->contact_subtitle,
            'contact_content' => $request->contact_content,
            'contact_mobile_no' => $request->contact_mobile_no,
            'contact_email' => $request->contact_email,
            'register_title' => $request->register_title,
            /******* End Contact Us Page Section *******/

            /******* Start Event List Page Section *******/
            'event_list_title' => $request->event_list_title,
            'event_list_subtitle' => $request->event_list_subtitle,
            /******* End Progrtam List Page Section *******/

            /******* Start Progrtam List Page Section *******/
            'program_list_title' => $request->program_list_title,
            'program_list_subtitle' => $request->program_list_subtitle,
            
            /******* End Progrtam List Page Section *******/


            /******* Start Blog List Page Section *******/
            'blog_list_title' => $request->blog_list_title,
            'blog_list_subtitle' => $request->blog_list_subtitle,
            'blog_list_id' => $request->blog_list_id,
            /******* End Blog List Page Section *********/

            /******* Start Resources List Page Section *******/
                                // Video
            'resource_head_title' => $request->resource_head_title,
            'resource_head_subtitle' => $request->resource_head_subtitle,

            'resource_video_title' =>  isset($request->resource_video_title[0]) ? json_encode($request->resource_video_title) : null,
            'resource_video_image' => $resource_video_image_files ?? null,
            'resource_video' => $resource_video_files ?? null,
                                // Policy

            'resource_policy_head_title' => $request->resource_policy_head_title,
            'resource_policy_head_subtitle' => $request->resource_policy_head_subtitle,

            'resource_policy_doc_title' =>  isset($request->resource_policy_doc_title[0]) ? json_encode($request->resource_policy_doc_title) : null,
            'resource_policy_doc_icon' => $resource_policy_doc_icon_files ?? null,
            'resource_policy_doc' => $resource_policy_doc_files ?? null,

                                // Useful Document
            'resource_document_head_title' => $request->resource_document_head_title,
            'resource_document_head_subtitle' => $request->resource_document_head_subtitle,

            'resource_document_doc_title' => isset($request->resource_document_doc_title[0]) ? json_encode($request->resource_document_doc_title) : null,
            'resource_document_doc_icon' => $resource_document_doc_icon ?? null,
            'resource_document_doc' => $resource_document_doc ?? null,

                                // Story
            'resource_story_head_title'=> $request->resource_story_head_title,
            'resource_story_head_subtitle'=> $request->resource_story_head_subtitle,
            'resource_story_head_title'=> $request->resource_story_head_title,

            'resource_story_image' => $resource_story_image_files ?? null,
            /******* End Resources List Page Section *********/


            /******* Start Donation Page Section *********/
            'donation_who_we_title' => $request->donation_who_we_title,
            'donation_who_we_subtitle' => $request->donation_who_we_subtitle,
            'donation_who_we_content' => $request->donation_who_we_content,
            'donation_who_we_image_1' => $donation_who_we_image_1 ?? null,
            'donation_who_we_image_title_1' => $request->donation_who_we_image_title_1,
            'donation_who_we_image_content_1' => $request->donation_who_we_image_content_1,

            'donation_who_we_image_2' => $donation_who_we_image_2 ?? null,
            'donation_who_we_image_title_2' => $request->donation_who_we_image_title_2,
            'donation_who_we_image_content_2' => $request->donation_who_we_image_content_2,
            /******* End Donation Page Section *********/

            /******* Start Ladership Registration Page Section *********/
            'registration_title' => $request->registration_title,
            'registration_content' => $request->registration_content,
            'registration_image' => $registration_image ?? null,
            'registration_image_content' => $request->registration_image_content,
            /******* End Ladership Registration Page Section   *********/



        ];  
        // dd($page_sections);      
        $page->content = json_encode($page_sections);
        $page->save();

        return redirect()->back()->with('success','Record has been created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $banner_sliders = Banner::get();
        $teams = Team::get();
        $membership_plans = MembershipPlan::get();
        $core_values = CoreValue::get();
        $programs = Program::get();
        $events = Event::get();
        $blogs = Blog::get();
        $faqs = Faq::get();
        $strategic_priorities = StrategicPriority::get();
        $fund_raisers = FundRaiser::get();

        $page_content = json_decode($page->content);
        // dd($page_content->fund_raiser_id);


        /********* Start for About page **********/
        $about_who_we_bannerArr = [];
        if (isset($page_content->about_who_we_banner)) {
            $about_who_we_bannerArr = $page_content->about_who_we_banner;
        }
        /********* End for About page ************/


       /********* Start for resource page **********/
                    // Video Section
        $resource_video_titleArr = [];
        if (isset($page_content->resource_video_title)) {
            $resource_video_titleArr = json_decode($page_content->resource_video_title);
        }
                    // Policy
        $resource_policy_titleArr = [];
        if (isset($page_content->resource_policy_doc_title)) {
            $resource_policy_titleArr = json_decode($page_content->resource_policy_doc_title);
        }
       /********* End for resource page **********/

       // dd($page_content);

        return view('backend.page.edit',compact('page','page_content','banner_sliders','teams','membership_plans','core_values','programs','events','blogs','faqs','strategic_priorities','fund_raisers','about_who_we_bannerArr','resource_video_titleArr','resource_policy_titleArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        // dd($page);

        $request->validate([
            'title'=>'required|unique:pages,title,'.$page->id,
            // 'meta_key'=>'required|unique:pages,meta_key,'.$page->id,
        ]);

        // dd($request->resource_video_title);

        $page_content = json_decode($page->content);
        $page->fill($request->all());
        $page->slug = Str::slug($request->title);

        if ($request->hasFile('banner')) {

            if (Storage::exists('public/pages/'.$page->banner)) {
                Storage::delete('public/pages/'.$page->banner);
            }

           $banner_name = $request->file('banner');
           $ext = $banner_name->extension();
           $banner_filename = uniqid().'.'.$ext;
           $banner_name->storeAs('public/pages/',$banner_filename);
           $page->banner = $banner_filename;
        }


        // Start For about page
       if ($request->hasFile('about_who_we_banner')) {
           foreach ($request->file('about_who_we_banner') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $about_who_we_banner_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$about_who_we_banner_filename);
                $about_who_we_banner_files[] = $about_who_we_banner_filename;
            }
       }else{
            $about_who_we_banner_files = $page_content->about_who_we_banner  ?? null;
       }

       if ($request->hasFile('about_who_we_image_1')) {
            if (Storage::exists('public/pages/'.$page_content->about_who_we_image_1)) {
                Storage::delete('public/pages/'.$page_content->about_who_we_image_1);
            }
           $about_who_we_image_1_name = $request->file('about_who_we_image_1');
           $ext = $about_who_we_image_1_name->extension();
           $about_who_we_image_1_filename = uniqid().'.'.$ext;
           $about_who_we_image_1_name->storeAs('public/pages/',$about_who_we_image_1_filename);
           $about_who_we_image_1 = 'storage/pages/'.$about_who_we_image_1_filename;
        }else{
            $about_who_we_image_1 = $page_content->about_who_we_image_1 ?? null;
        }

        if ($request->hasFile('about_who_we_image_2')) {
            if (Storage::exists('public/pages/'.$page_content->about_who_we_image_2)) {
                Storage::delete('public/pages/'.$page_content->about_who_we_image_2);
            }
           $about_who_we_image_2_name = $request->file('about_who_we_image_2');
           $ext = $about_who_we_image_2_name->extension();
           $about_who_we_image_2_filename = uniqid().'.'.$ext;
           $about_who_we_image_2_name->storeAs('public/pages/',$about_who_we_image_2_filename);
           $about_who_we_image_2 = $about_who_we_image_2_filename;
        }else{
            $about_who_we_image_2 = $page_content->about_who_we_image_2 ?? null;
        }

        // End For About Page


       // Start For Resource page

       if ($request->hasFile('resource_video_image')) {
           foreach ($request->file('resource_video_image') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_video_image_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_video_image_filename);
                $resource_video_image_files[] = $resource_video_image_filename;
            }
       }
       else{
            $resource_video_image_files = $page_content->resource_video_image ?? null;
       }


       if ($request->hasFile('resource_video')) {
           foreach ($request->file('resource_video') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_video_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_video_filename);
                $resource_video_files[] = $resource_video_filename;
            }
       }


       if ($request->hasFile('resource_policy_doc_icon')) {
           foreach ($request->file('resource_policy_doc_icon') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_policy_doc_icon_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_policy_doc_icon_filename);
                $resource_policy_doc_icon_files[] = $resource_policy_doc_icon_filename;
            }
       }


       if ($request->hasFile('resource_policy_doc')) {
           foreach ($request->file('resource_policy_doc') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_policy_doc_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_policy_doc_filename);
                $resource_policy_doc_files[] = $resource_policy_doc_filename;
            }
       }

       if ($request->hasFile('resource_story_image')) {
           foreach ($request->file('resource_story_image') as $image) {
                $rand = rand('111111111','999999999');
                $ext = $image->getClientOriginalExtension();
                $resource_story_image_filename = $rand.".".$ext;
                $image->storeAs('public/pages/',$resource_story_image_filename);
                $resource_story_image_files[] = $resource_story_image_filename;
            }
       }
       else{
            $resource_story_image_files = $page_content->resource_story_image ?? null;
       }
       // End For Resource page

       // Start Donation Page
       if ($request->hasFile('donation_who_we_image_1')) {
            if (Storage::exists('public/pages/'.$page_content->donation_who_we_image_1)) {
                Storage::delete('public/pages/'.$page_content->donation_who_we_image_1);
            }
           $donation_who_we_image_1_name = $request->file('donation_who_we_image_1');
           $ext = $donation_who_we_image_1_name->extension();
           $donation_who_we_image_1_filename = uniqid().'.'.$ext;
           $donation_who_we_image_1_name->storeAs('public/pages/',$donation_who_we_image_1_filename);
           $donation_who_we_image_1 = $donation_who_we_image_1_filename;
        }else{
            $donation_who_we_image_1 = $page_content->donation_who_we_image_1 ?? null;
       }

        if ($request->hasFile('donation_who_we_image_2')) {
            if (Storage::exists('public/pages/'.$page_content->donation_who_we_image_2)) {
                Storage::delete('public/pages/'.$page_content->donation_who_we_image_2);
            }
           $donation_who_we_image_2_name = $request->file('donation_who_we_image_2');
           $ext = $donation_who_we_image_2_name->extension();
           $donation_who_we_image_2_filename = uniqid().'.'.$ext;
           $donation_who_we_image_2_name->storeAs('public/pages/',$donation_who_we_image_2_filename);
           $donation_who_we_image_2 = $donation_who_we_image_2_filename;
        }else{
            $donation_who_we_image_2 = $page_content->donation_who_we_image_2 ?? null;
       }
        // End Donation Page

       // Start Registration Page
        if ($request->hasFile('registration_image')) {
            if (Storage::exists('public/pages/'.$page_content->registration_image)) {
                Storage::delete('public/pages/'.$page_content->registration_image);
            }
           $registration_image_name = $request->file('registration_image');
           $ext = $registration_image_name->extension();
           $registration_image_filename = uniqid().'.'.$ext;
           $registration_image_name->storeAs('public/pages/',$registration_image_filename);
           $registration_image = $registration_image_filename;
        }else{
            $registration_image = $page_content->registration_image ?? null;
        }
       // End Registration Page


        $page_sections = [
            /******* Start Home Page Section *******/
            'page_content' => $request->page_content,
            'banner_slider_id'=> $request->banner_slider_id,

            'who_we_title'=> $request->who_we_title,
            'who_we_subtitle'=> $request->who_we_subtitle,
            'who_we_content_title_1'=> $request->who_we_content_title_1,
            'who_we_content_1'=> $request->who_we_content_1,
            'who_we_content_title_2'=> $request->who_we_content_title_2,
            'who_we_content_2'=> $request->who_we_content_2,
            'team_id'=> $request->team_id,

            'core_value_title'=> $request->core_value_title,
            'core_value_subtitle'=> $request->core_value_subtitle,
            'core_value_content'=> $request->core_value_content,
            'core_value_id'=> $request->core_value_id,

            'program_title'=> $request->program_title,
            'program_subtitle'=> $request->program_subtitle,
            'program_id'=> $request->program_id,

            'member_title'=> $request->member_title,
            'member_subtitle'=> $request->member_subtitle,
            'member_content'=> $request->member_content,
            'member_benefit_id'=> $request->member_benefit_id,

            'membership_title'=> $request->membership_title,
            'membership_subtitle'=> $request->membership_subtitle,
            'membership_content'=> $request->membership_content,
            'membership_plan_id'=> $request->membership_plan_id,

            'event_title'=> $request->event_title,
            'event_subtitle'=> $request->event_subtitle,
            'event_id'=> $request->event_id,

            'donation_title'=> $request->donation_title,
            'donation_subtitle'=> $request->donation_subtitle,
            'donation_content'=> $request->donation_content,
            'donation_btn_label'=> $request->donation_btn_label,
            'donation_btn_url'=> $request->donation_btn_url,

            'blog_title'=> $request->blog_title,
            'blog_subtitle'=> $request->blog_subtitle,
            'blog_id'=> $request->blog_id,

            'faq_title'=> $request->faq_title,
            'faq_subtitle'=> $request->faq_subtitle,
            'faq_content'=> $request->faq_content,
            'faq_id'=> $request->faq_id,
             /******* End Home Page Section **********/

             /******* Start About Page Section *******/
            'about_banner_bread_crumb_title' => $request->about_banner_bread_crumb_title,
            'about_banner_subtitle' => $request->about_banner_subtitle,
            'about_banner_content' => $request->about_banner_content,

            // here multiplse image should upload
            'about_who_we_banner' => $about_who_we_banner_files,

            'about_who_we_title' => $request->about_who_we_title,
            'about_who_we_subtitle' => $request->about_who_we_subtitle,
            'about_who_we_content' => $request->about_who_we_content,

            'about_who_we_image_1' => $about_who_we_image_1,
            'about_who_we_image_title_1' => $request->about_who_we_image_title_1,
            'about_who_we_image_content_1' => $request->about_who_we_image_content_1,

            'about_who_we_image_2' => $about_who_we_image_2,
            'about_who_we_image_title_2' => $request->about_who_we_image_title_2,
            'about_who_we_image_content_2' => $request->about_who_we_image_content_2,

            'about_strategic_title' => $request->about_strategic_title,
            'about_strategic_subtitle' => $request->about_strategic_subtitle,
            'strategic_priority_id' => $request->strategic_priority_id,

            'about_fund_raiser_title' => $request->about_fund_raiser_title,
            'about_fund_raiser_subtitle' => $request->about_fund_raiser_subtitle,
            'about_fund_raiser_content' => $request->about_fund_raiser_content,
            'fund_raiser_id' => $request->fund_raiser_id,
            /******* End About Page Section *******/

            /******* Start Contact Us Page Section *******/
            'contact_title' => $request->contact_title,
            'contact_subtitle' => $request->contact_subtitle,
            'contact_content' => $request->contact_content,
            'contact_mobile_no' => $request->contact_mobile_no,
            'contact_email' => $request->contact_email,
            'register_title' => $request->register_title,
            /******* End Contact Us Page Section *********/

            /******* Start Event List Page Section ********/
            'event_list_title' => $request->event_list_title,
            'event_list_subtitle' => $request->event_list_subtitle,

            /******* End Event List Page Section *******/

            /******* Start Progrtam List Page Section *******/
            'program_list_title' => $request->program_list_title,
            'program_list_subtitle' => $request->program_list_subtitle,

            /******* End Progrtam List Page Section *********/


            /******* Start Blog List Page Section *********/
            'blog_list_title' => $request->blog_list_title,
            'blog_list_subtitle' => $request->blog_list_subtitle,
            'blog_list_id' => $request->blog_list_id,
            /******* End Blog List Page Section ***********/

            /******* Start Resources List Page Section *******/
                                // Video
            'resource_head_title' => $request->resource_head_title,
            'resource_head_subtitle' => $request->resource_head_subtitle,

            'resource_video_title' => isset($request->resource_video_title[0]) ? json_encode($request->resource_video_title) : null,
            // 'resource_video_image' => $resource_video_image_files ?? $page_content->resource_video_image,
            'resource_video_image' => $resource_video_image_files,
            // 'resource_video_image' => json_encode($resource_video_image_files),
            'resource_video' => $resource_video_files ?? null,

                                // Policy
            'resource_policy_head_title' => $request->resource_policy_head_title,
            'resource_policy_head_subtitle' => $request->resource_policy_head_subtitle,

            'resource_policy_doc_title' => isset($request->resource_policy_doc_title[0]) ? json_encode($request->resource_policy_doc_title) : null,
            'resource_policy_doc_icon' => $resource_policy_doc_icon_files ?? null,
            'resource_policy_doc' => $resource_policy_doc_files ?? null,

                                // Useful Document
            'resource_document_head_title' => $request->resource_document_head_title,
            'resource_document_head_subtitle' => $request->resource_document_head_subtitle,

            'resource_document_doc_title' => isset($request->resource_document_doc_title[0]) ? json_encode($request->resource_document_doc_title) : null,
            'resource_document_doc_icon' => $resource_document_doc_icon ?? null,
            'resource_document_doc' => $resource_document_doc ?? null,

                                // Story
            'resource_story_head_title'=> $request->resource_story_head_title,
            'resource_story_head_subtitle'=> $request->resource_story_head_subtitle,
            'resource_story_head_title'=> $request->resource_story_head_title,

            'resource_story_image' => $resource_story_image_files,

            /******* End Resources List Page Section **********/


            /******* Start Donation List Page Section *********/
            'donation_who_we_title' => $request->donation_who_we_title,
            'donation_who_we_subtitle' => $request->donation_who_we_subtitle,
            'donation_who_we_content' => $request->donation_who_we_content,
            'donation_who_we_image_1' => $donation_who_we_image_1,
            'donation_who_we_image_title_1' => $request->donation_who_we_image_title_1,
            'donation_who_we_image_content_1' => $request->donation_who_we_image_content_1,

            'donation_who_we_image_2' => $donation_who_we_image_2,
            'donation_who_we_image_title_2' => $request->donation_who_we_image_title_2,
            'donation_who_we_image_content_2' => $request->donation_who_we_image_content_2,
            /******* End Donation List Page Section *********/

            /******* Start Ladership Registration Page Section *********/
            'registration_title' => $request->registration_title,
            'registration_content' => $request->registration_content,
            'registration_image' => $registration_image,
            'registration_image_content' => $request->registration_image_content,
            /******* End Ladership Registration Page Section   *********/
           ];

        $page->content = json_encode($page_sections);
        $result = $page->save();


        if(!empty($result)){
            /*$notify[] = ['success',_('admin_messages.updated')];
            return redirect()->back()->withNotify($notify);*/
            // return redirect()->back->witth('success',_('admin_messages.updated'));
            return redirect()->back()->with('success',__('admin_messages.updated'));
            // $notify[] = ['success',_('admin_messages.updated')];
            // return redirect()->back()->with('success','Record has been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page_content = json_decode($page->content);
        // Donation Page Remove Image
        if (Storage::exists('public/pages/'.$page_content->donation_who_we_image_1)) {
            Storage::delete('public/pages/'.$page_content->donation_who_we_image_1);
        }
        if (Storage::exists('public/pages/'.$page_content->donation_who_we_image_2)) {
            Storage::delete('public/pages/'.$page_content->donation_who_we_image_2);
        }
        // About Us Page
        if (Storage::exists('public/pages/'.$page_content->about_who_we_image_1)) {
            Storage::delete('public/pages/'.$page_content->about_who_we_image_1);
        } 
        if (Storage::exists('public/pages/'.$page_content->about_who_we_image_2)) {
            Storage::delete('public/pages/'.$page_content->about_who_we_image_2);
        } 
        // Registration Page 
        if (Storage::exists('public/pages/'.$page_content->registration_image)) {
            Storage::delete('public/pages/'.$page_content->registration_image);
        } 

        $page->delete();
        return redirect()->back()->with('success','Record has been deleted successfully');
    }
}
