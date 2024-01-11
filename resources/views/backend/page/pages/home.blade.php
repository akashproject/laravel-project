{{-- Start Home Template Category Section --}}
<div class="accordion content_template template_home" id="accordionHomeBannerSlider">
   <div class="card">
      <div class="card-header" id="headingHomeBannerSlider">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeBannerSlider" aria-expanded="false" aria-controls="collapseHomeBannerSlider">
               Banner Slider Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeBannerSlider" class="collapse show" aria-labelledby="headingHomeBannerSlider" data-parent="#accordionHomeBannerSlider">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Choose Banner List</label>
                  <select class="form-control chosen-select" name="banner_slider_id[]" multiple>
                     @if ($banner_sliders->count() > 0)
                     @foreach ($banner_sliders as $banner_slider)
                     @if (isset($page_content->banner_slider_id) && in_array($banner_slider->id, $page_content->banner_slider_id))
                        <option value="{{ $banner_slider->id }}" selected="">{{ $banner_slider->title }}</option>
                     @else
                        <option value="{{ $banner_slider->id }}">{{ $banner_slider->title }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Category Section --}}


{{-- Start Home Template Who We Are Section --}}
<div class="accordion content_template template_home" id="accordionHomeWhoWeAre">
   <div class="card">
      <div class="card-header" id="headingHomeWhoWeAre">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeWhoWeAre" aria-expanded="false" aria-controls="collapseHomeWhoWeAre">
               Who We Are Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeWhoWeAre" class="collapse show" aria-labelledby="headingHomeWhoWeAre" data-parent="#accordionHomeWhoWeAre">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="who_we_title" value="{{ old('who_we_title', $page_content->who_we_title ?? '') }}" class="form-control @error('who_we_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="who_we_subtitle" value="{{ old('who_we_subtitle', $page_content->who_we_subtitle ?? '') }}" class="form-control @error('who_we_subtitle') is-invalid @enderror" />
               </div>
               <div class="form-group">
                  <label class="form-label">Content Title 1</label>
                  <input type="text" name="who_we_content_title_1" value="{{ old('who_we_content_title_1', $page_content->who_we_content_title_1 ?? '') }}" class="form-control @error('who_we_content_title_1') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Content 1</label>
                  <textarea name="who_we_content_1" class="form-control tinymce @error('who_we_content_1') is-invalid @enderror" >{{ old('who_we_content_1', $page_content->who_we_content_1 ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Content Title 2</label>
                  <input type="text" name="who_we_content_title_2" value="{{ old('who_we_content_title_2', $page_content->who_we_content_title_2 ?? '') }}" class="form-control @error('who_we_content_title_2') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Content 2</label>
                  <textarea name="who_we_content_2" class="form-control tinymce @error('who_we_content_2') is-invalid @enderror" >{{ old('who_we_content_2', $page_content->who_we_content_2 ?? '') }}</textarea>
               </div>

               

               {{-- <div class="form-group">
                  <label class="form-label">Btn Label</label>
                  <input name="who_we_btn_label" class="form-control @error('who_we_btn_label') is-invalid @enderror" value="{{ old('who_we_btn_label', $page->who_we_btn_label ?? '') }}"/>
               </div>

               <div class="form-group">
                  <label class="form-label">Btn Label Link</label>
                  <input name="who_we_btn_link" class="form-control @error('who_we_btn_link') is-invalid @enderror" value="{{ old('who_we_btn_link', $page->who_we_btn_link ?? '') }}"/>
               </div> --}}

               <div class="form-group">
                  <label class="form-label">Choose Team</label>
                  <select class="form-control chosen-select" name="team_id[]" multiple>
                     @if ($teams->count() > 0)
                     @foreach ($teams as $team)
                     @if (isset($page_content->team_id) && in_array($team->id, $page_content->team_id))
                        <option value="{{ $team->id }}" selected="">{{ $team->name }}</option>
                     @else
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Who We Are Section --}}

{{-- Start Home Template CoreValue Section --}}
<div class="accordion content_template template_home template_about" id="accordionHomeCoreValue">
   <div class="card">
      <div class="card-header" id="headingHomeCoreValue">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeCoreValue" aria-expanded="false" aria-controls="collapseHomeCoreValue">
               CoreValue Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeCoreValue" class="collapse show" aria-labelledby="headingHomeCoreValue" data-parent="#accordionHomeCoreValue">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="core_value_title" value="{{ old('core_value_title', $page_content->core_value_title ?? '') }}" class="form-control @error('core_value_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="core_value_subtitle" value="{{ old('core_value_subtitle', $page_content->core_value_subtitle ?? '') }}" class="form-control @error('core_value_subtitle') is-invalid @enderror" />
               </div>
               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="core_value_content" class="form-control tinymce @error('core_value_content') is-invalid @enderror" >{{ old('core_value_content', $page_content->core_value_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Core Value List</label>
                  <select class="form-control chosen-select" name="core_value_id[]" multiple>
                     @if ($core_values->count() > 0)
                     @foreach ($core_values as $core_value)
                     @if (isset($page_content->core_value_id) && in_array($core_value->id, $page_content->core_value_id))
                        <option value="{{ $core_value->id }}" selected="">{{ $core_value->title }}</option>
                     @else
                        <option value="{{ $core_value->id }}">{{ $core_value->title }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template CoreValue Section --}}

{{-- Start Home Template Program Section --}}
<div class="accordion content_template template_home" id="accordionHomeProgram">
   <div class="card">
      <div class="card-header" id="headingHomeProgram">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeProgram" aria-expanded="false" aria-controls="collapseHomeProgram">
               Program Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeProgram" class="collapse show" aria-labelledby="headingHomeProgram" data-parent="#accordionHomeProgram">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="program_title" value="{{ old('program_title', $page_content->program_title ?? '') }}" class="form-control @error('program_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="program_subtitle" value="{{ old('program_subtitle', $page_content->program_subtitle ?? '') }}" class="form-control @error('program_subtitle') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Program List</label>
                  <select class="form-control chosen-select" name="program_id[]" multiple>
                     @if ($programs->count() > 0)
                     @foreach ($programs as $program)
                     @if (isset($page_content->program_id) && in_array($program->id, $page_content->program_id))
                        <option value="{{ $program->id }}" selected="">{{ $program->title }}</option>
                     @else
                        <option value="{{ $program->id }}">{{ $program->title }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Program Section --}}

{{-- Start Home Template Member Section --}}
<div class="accordion content_template template_home" id="accordionHomeMember">
   <div class="card">
      <div class="card-header" id="headingHomeMember">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeMember" aria-expanded="false" aria-controls="collapseHomeMember">
               Member Benefits Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeMember" class="collapse show" aria-labelledby="headingHomeMember" data-parent="#accordionHomeMember">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="member_title" value="{{ old('member_title', $page_content->member_title ?? '') }}" class="form-control @error('member_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="member_subtitle" value="{{ old('member_subtitle', $page_content->member_subtitle ?? '') }}" class="form-control @error('member_subtitle') is-invalid @enderror" />
               </div>
               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="member_content" class="form-control tinymce @error('member_content') is-invalid @enderror" >{{ old('member_content', $page_content->member_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Member List</label>
                  <select class="form-control chosen-select" name="member_benefit_id[]" multiple>
                     @if ($membership_plans->count() > 0)
                     @foreach ($membership_plans as $member_benefit)
                     @if (isset($page_content->member_benefit_id) && in_array($member_benefit->id, $page_content->member_benefit_id))
                        <option value="{{ $member_benefit->id }}" selected="">{{ $member_benefit->name }}</option>
                     @else
                        <option value="{{ $member_benefit->id }}">{{ $member_benefit->name }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Member Section --}}

{{-- Start Home Template Membership Plan Section --}}
<div class="accordion content_template template_home" id="accordionHomeMembershipPlan">
   <div class="card">
      <div class="card-header" id="headingHomeMembershipPlan">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeMembershipPlan" aria-expanded="false" aria-controls="collapseHomeMembershipPlan">
               Membership Plan Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeMembershipPlan" class="collapse show" aria-labelledby="headingHomeMembershipPlan" data-parent="#accordionHomeMembershipPlan">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="membership_title" value="{{ old('membership_title', $page_content->membership_title ?? '') }}" class="form-control @error('membership_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="membership_subtitle" value="{{ old('membership_subtitle', $page_content->membership_subtitle ?? '') }}" class="form-control @error('membership_subtitle') is-invalid @enderror" />
               </div>
               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="membership_content" class="form-control tinymce @error('membership_content') is-invalid @enderror" >{{ old('membership_content', $page_content->membership_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Membership Plan List</label>
                  <select class="form-control chosen-select" name="membership_plan_id[]" multiple>
                     @if ($membership_plans->count() > 0)
                     @foreach ($membership_plans as $membership_plan)
                     @if (isset($page_content->membership_plan_id) && in_array($membership_plan->id, $page_content->membership_plan_id))
                        <option value="{{ $membership_plan->id }}" selected="">{{ $membership_plan->name }}</option>
                     @else
                        <option value="{{ $membership_plan->id }}">{{ $membership_plan->name }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Membership Plan Section --}}

{{-- Start Home Template Event Section --}}
<div class="accordion content_template template_home" id="accordionHomeEvent">
   <div class="card">
      <div class="card-header" id="headingHomeEvent">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeEvent" aria-expanded="false" aria-controls="collapseHomeEvent">
               Event Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeEvent" class="collapse show" aria-labelledby="headingHomeEvent" data-parent="#accordionHomeEvent">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="event_title" value="{{ old('event_title', $page_content->event_title ?? '') }}" class="form-control @error('event_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="event_subtitle" value="{{ old('event_subtitle', $page_content->event_subtitle ?? '') }}" class="form-control @error('event_subtitle') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Event List</label>
                  <select class="form-control chosen-select" name="event_id[]" multiple>
                     @if ($events->count() > 0)
                     @foreach ($events as $event)
                     @if (isset($page_content->event_id) && in_array($event->id, $page_content->event_id))
                        <option value="{{ $event->id }}" selected="">{{ $event->title }}</option>
                     @else
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Event Section --}}

{{-- Start Home Template Donation Section --}}
<div class="accordion content_template template_home template_about" id="accordionHomeDonation">
   <div class="card">
      <div class="card-header" id="headingHomeDonation">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeDonation" aria-expanded="false" aria-controls="collapseHomeDonation">
               Donation Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeDonation" class="collapse show" aria-labelledby="headingHomeDonation" data-parent="#accordionHomeDonation">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="donation_title" value="{{ old('donation_title', $page_content->donation_title ?? '') }}" class="form-control @error('donation_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">SubTitle</label>
                  <input type="text" name="donation_subtitle" value="{{ old('donation_subtitle', $page_content->donation_subtitle ?? '') }}" class="form-control @error('donation_subtitle') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="donation_content" class="form-control tinymce @error('donation_content') is-invalid @enderror" >{{ old('donation_content', $page_content->donation_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Btn Label</label>
                  <input type="text" name="donation_btn_label" value="{{ old('donation_btn_label', $page_content->donation_btn_label ?? '') }}" class="form-control @error('donation_btn_label') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Btn Url</label>
                  <input type="text" name="donation_btn_url" value="{{ old('donation_btn_url', $page_content->donation_btn_url ?? '') }}" class="form-control @error('donation_btn_url') is-invalid @enderror" />
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Donation Section --}}

{{-- Start Home Template Blog Post Section --}}
<div class="accordion content_template template_home" id="accordionHomeBlogPost">
   <div class="card">
      <div class="card-header" id="headingHomeBlogPost">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeBlogPost" aria-expanded="false" aria-controls="collapseHomeBlogPost">
               Blog Posts Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeBlogPost" class="collapse show" aria-labelledby="headingHomeBlogPost" data-parent="#accordionHomeBlogPost">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="blog_title" value="{{ old('blog_title', $page_content->blog_title ?? '') }}" class="form-control @error('blog_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="blog_subtitle" value="{{ old('blog_subtitle', $page_content->blog_subtitle ?? '') }}" class="form-control @error('blog_subtitle') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Blog List</label>
                  <select class="form-control chosen-select" name="blog_id[]" multiple>
                     @if ($blogs->count() > 0)
                     @foreach ($blogs as $blog)
                     @if (isset($page_content->blog_id) && in_array($blog->id, $page_content->blog_id))
                        <option value="{{ $blog->id }}" selected="">{{ $blog->title }}</option>
                     @else
                        <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Blog Post Section --}}


{{-- Start Home Template Event Section --}}
<div class="accordion content_template template_home template_about" id="accordionHomeFaq">
   <div class="card">
      <div class="card-header" id="headingHomeFaq">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseHomeFaq" aria-expanded="false" aria-controls="collapseHomeFaq">
               Faq Section
            </button>
         </h2>
         </div>
         <div id="collapseHomeFaq" class="collapse show" aria-labelledby="headingHomeFaq" data-parent="#accordionHomeFaq">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="faq_title" value="{{ old('faq_title', $page_content->faq_title ?? '') }}" class="form-control @error('faq_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="faq_subtitle" value="{{ old('faq_subtitle', $page_content->faq_subtitle ?? '') }}" class="form-control @error('faq_subtitle') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="faq_content" class="form-control tinymce @error('faq_content') is-invalid @enderror" >{{ old('faq_content', $page_content->faq_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Faq List</label>
                  <select class="form-control chosen-select" name="faq_id[]" multiple>
                     @if ($faqs->count() > 0)
                     @foreach ($faqs as $faq)
                     @if (isset($page_content->faq_id) && in_array($faq->id, $page_content->faq_id))
                        <option value="{{ $faq->id }}" selected="">{{ $faq->question }}</option>
                     @else
                        <option value="{{ $faq->id }}">{{ $faq->question }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End Home Template Event Section --}}

{{-- End Home Template Subscribe --}}



