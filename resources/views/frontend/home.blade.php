@extends('frontend.layouts.master')
@section('title',$page->title)
@section('frontendContent')
<div class="main__banner">
   <div class="owl-carousel owl-theme carousel__main__slider">
      @if (count($banners) > 0)
      @foreach ($banners as $banner)
      <div class="item">
         <div class="image__box">
            {{-- <img src="{{asset('frontend_assets/assets/images/header-image.png')}}" alt="" /> --}}
            <img src="{{ !empty($banner->banner) ? asset('storage/banners/'.$banner->banner) : asset('frontend_assets/assets/default-image.png') }}" alt="{{ $banner->title ?? '' }}" />
         </div>
         <div class="bannre__content">
            <div class="container">
               <div class="bannre__content__inner__wrapp">
                   {{-- {{ !empty($banner->sub_title) ? 'style=display:block' : 'style=display:none' }} --}}
                   @if (!empty($banner->title))
                      <h1>{{ $banner->title }}</h1>
                   @endif
                   @if (!empty($banner->sub_title))
                     <p>{{ $banner->sub_title }}</p>
                   @endif
                  <div class="btn__wrapp">
                     <a href="{{ $banner->banner_btn_link }}" target="_blank">{{ $banner->banner_btn_label }}</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
      @endif
   </div>
</div>
<div class="body__content__main">

   {{-- Start Who We section --}}
   <div class="about__bncp__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="sub__heading">
                  <h3>{{ $home_content->who_we_title ?? '' }}</h3>
               </div>
               <h2>{{ $home_content->who_we_subtitle ?? '' }}</h2>
               <div class="btn__wrapp">
                  <a href="#">Read More</a>
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="content__wrapp">
                  <div class="content__wrapp__inner">
                     <h3>{{ $home_content->who_we_content_title_1 ?? '' }}</h3>
                     {!! $home_content->who_we_content_1 ?? '' !!}
                  </div>
                  <div class="content__wrapp__inner">
                     <h3>{{ $home_content->who_we_content_title_2 ?? '' }}</h3>
                     {!! $home_content->who_we_content_2 ?? '' !!}
                  </div>
               </div>
            </div>
         </div>
         <div class="gallery__wrapp">
  
            @if (count($teams) > 0)
	         @foreach ($teams as $team)
	         <div class="image__box">
				<img src="{{ !empty($team->image) ? asset('storage/teams/'.$team->image) : asset('frontend_assets/assets/default-image.png') }}" alt="{{ $team->name }}" />
	         </div>
	         @endforeach
	         @endif

         </div>
      </div>
   </div>
   {{-- Start Who We section --}}

   <div class="core__value__bncp">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $home_content->core_value_title ?? '' }}</h3>
         </div>
         <h2>{{ $home_content->core_value_subtitle ?? '' }}</h2>
         <p>{!! $home_content->core_value_content ?? '' !!}</p>
         <div class="owl-carousel owl-theme core__value__slider">
            @if (count($core_values) > 0)
	         @foreach ($core_values as $core_value)
            <div class="item">
               <div class="core__value__card">
               	  <i class="ico__box"><img src="{{ !empty($core_value->image) ? asset('storage/core_values/'.$core_value->image) : asset('frontend_assets/assets/default-image.png') }}" alt="{{ $core_value->title }}" /></i>
                  <h3>{{ $core_value->title }}</h3>
                  {!! $core_value->content !!}
               </div>
            </div>
           @endforeach
           @else
            <h2>No data found!!</h2>
	        @endif
         </div>
      </div>
   </div>
   <div class="bncp__program">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $home_content->program_title ?? '' }}</h3>
         </div>
         <h2>{{ $home_content->program_subtitle ?? '' }}</h2>
         <div class="owl-carousel owl-theme program__slider">

           @if (count($programs) > 0)
	        @foreach ($programs as $program)
            <div class="item">
               <div class="program__card">
                  <div class="image__box"><img src="{{ !empty($program->image) ? asset('storage/programs/'.$program->image) : asset('frontend_assets/assets/default-image.png') }}" alt="{{ $program->title }}" /></div>
                  <div class="card__content">
                     <h3>{{ $program->title }}</h3>
                     {!! Str::words($program->short_description,19) !!}
                     <div class="card__meta">
                        <i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/clock-ico.svg') }}" alt="" /></i>
                        <ul>
                           {{-- <li>November 25</li> --}}
                           {{-- <li>10:00 AM - 06:00 PM</li> --}}
                           <li>{{ Carbon\Carbon::parse($program->program_date)->format('d M Y'); }}</li>
                           @php
                              $time = date('h:i A',strtotime($program->from_date)) .' - '.date('h:i A',strtotime($program->to_date));
                           @endphp

                           <li>{{ $time }}</li>
                        </ul>
                     </div>
                     <div class="card__location">
                        <i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/location-ico.svg') }}" alt="" /></i>
                        <ul>
                           <li>{{ $program->location }}</li>
                        </ul>
                     </div>
                     <div class="card__content__footer">
                     	@if (!empty($program->price))
                     		<div class="price">${{ $program->price }} Onwards</div>
                     	@else
                     		<div class="price"></div>
                     	@endif

                        <a href="{{ route('program.details',$program->slug) }}">Join Now</a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            @else
            <h2>No data found!!</h2>
	         @endif
            
         </div>
      </div>
   </div>

   <div class="member__benefits">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $home_content->member_title ?? '' }}</h3>
         </div>
         <h2>{{ $home_content->member_subtitle ?? '' }}</h2>
         {!! $home_content->member_content ?? '' !!}
         <div class="tabs__wrapp">
            <ul class="nav nav-tabs nav__tabs" id="myTab" role="tablist">

               @if (count($member_benefits) > 0)
               @foreach ($member_benefits as $key=>$member_benefit)
               <li class="nav-item nav__item" role="presentation">
                  <button class="nav-link nav__link {{ $key == 0 ? 'active' : '' }}" id="members-tab-{{ $member_benefit->id }}" data-bs-toggle="tab" data-bs-target="#members-{{ $member_benefit->id }}" type="button" role="tab" aria-controls="members-{{ $member_benefit->id }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $member_benefit->name }}</button>
               </li>
               @endforeach
               @endif

            </ul>
            <div class="tab-content tab__content" id="myTabContent">
               @if (count($member_benefits) > 0)
               @foreach ($member_benefits as $key=>$member_benefit)
               @php
                  $member_child_dataArr = json_decode($member_benefit->member_child_data);
                  // dd(count($member_child_dataArr->member_child_title));
               @endphp
               <div class="tab-pane tab__pane fade {{ $key == 0 ? 'show active' : '' }}" id="members-{{ $member_benefit->id }}" role="tabpanel" aria-labelledby="members-tab-{{ $member_benefit->id }}">
                  <div class="row align-items-center">
                     <div class="col-lg-6 col-md-6">
                        <div class="tab__pane__col">
                           <div class="accordion">
                              @if (count($member_benefits) > 0)
                              @foreach ($member_child_dataArr->member_child_title as $key1=>$member_child_item)
                              <div class="accordion-item accordion__item" data-image-src="{{ asset('frontend_assets/assets/images/who-we-are-image1.png') }}">
                                 <div class="accordion-header accordion__header">{{ $member_child_dataArr->member_child_title[$key1] }}</div>
                                 <div class="accordion-content accordion__content">
                                    <p>Workshop series offered in Spring, Summer, and Fall to help build skills around leadership development, organizational efficiency/sustainability, and well-being</p>
                                    <div class="btn__wrapp">
                                       <a href="#">
                                          Explore More
                                          <i class="ico__box">
                                             <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.038 0.843002L10.627 2.261L13.897 5.516L0.291992 5.529L0.293992 7.529L13.862 7.516L10.647 10.746L12.064 12.156L17.708 6.486L12.038 0.843002Z" fill="#16344A"/>
                                             </svg>
                                          </i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="tab__pane__col">
                           <div class="image__box">
                              <img src="{{ asset('frontend_assets/assets/images/who-we-are-image1.png') }}" alt="Image 1">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               @endif
            </div>
         </div>
      </div>
   </div>


   <div class="membership__plans">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $home_content->membership_title ?? '' }}</h3>
         </div>
         <h2> {{ $home_content->membership_subtitle ?? '' }}</h2>
         {!! $home_content->membership_content ?? '' !!}
         <div class="plans__wrapp">
            <div class="row">
               @if (count($membership_plans) > 0)
               @foreach ($membership_plans as $membership_plan)
               <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="price__card price__card__premium">
                     <h3>{{ $membership_plan->name }}</h3>
                     {!! $membership_plan->description !!}
                     <div class="amount__wrapp">
                        <h2>${{ $membership_plan->price ?? '' }}<span>/ {{ $membership_plan->tenure }}</span></h2>
                        <div class="btn__wrapp"><a href="#">Get Started Now</a></div>
                        <div class="feature__list">
                           {!! $membership_plan->features !!}
                           {{-- <ul>
                              <li><i class="ico__box"><img src="assets/images/check-ico.svg" alt="" /></i><span>Feature 1</span></li>
                              <li><i class="ico__box"><img src="assets/images/check-ico.svg" alt="" /></i><span>Feature 2</span></li>
                              <li><i class="ico__box"><img src="assets/images/uncheck-ico.svg" alt="" /></i><span>Feature 3</span></li>
                              <li><i class="ico__box"><img src="assets/images/uncheck-ico.svg" alt="" /></i><span>Feature 4</span></li>
                              <li><i class="ico__box"><img src="assets/images/uncheck-ico.svg" alt="" /></i><span>Feature 5</span></li>
                              <li><i class="ico__box"><img src="assets/images/uncheck-ico.svg" alt="" /></i><span>Feature 6</span></li>
                           </ul> --}}
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               @endif
            </div>
         </div>
      </div>
   </div>

   <div class="bncp__events">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $home_content->event_title ?? '' }}</h3>
         </div>
         <h2>{{ $home_content->event_subtitle ?? '' }}</h2>
         <div class="events__wrapp">
            @if (count($events) > 0)
            @foreach ($events as $event)
            <div class="event__card">
               {{-- <div class="event__date">04<span>November 2023</span></div> --}}
               <div class="event__date">{{ Carbon\Carbon::parse($event->event_date)->format('d'); }}<span>{{ Carbon\Carbon::parse($event->event_date)->format('M Y'); }}</span></div>
               <div class="image__box"><img src="{{ !empty($event->image) ? asset('storage/events/'.$event->image) : asset('frontend_assets/assets/default-image.png') }}" alt="{{ $event->title }}"></div>
               <div class="event__content">
                  <h3>{{ Str::words($event->title,10) }}</h3>
                  <p>{!! Str::words($event->short_description,19) !!} </p>
                  <div class="event__meta">
                     <div class="event__time"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/clock-ico.svg') }}" alt="" /></i>
                        {{-- 10:00 AM - 06:00 PM --}}
                           @php
                              $time = date('h:i A',strtotime($event->from_date)) .' - '.date('h:i A',strtotime($event->to_date));
                           @endphp
                           {{-- <li>{{ $event->from_date .' - '. $event->to_date}}</li> --}}
                           <li>{{ date('h:i A',strtotime($event->from_date)) .' - '.date('h:i A',strtotime($event->to_date)) }}</li>
                     </div>
                     <div class="event__location"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/location-ico.svg') }}" alt="" /></i>{{ $event->location }}</div>
                  </div>
               </div>
               <div class="btn__wrapp"><a href="{{ route('event.details',$event->slug) }}">Learn More</a></div>
            </div>
            @endforeach
            @else
               <h2>No data found!!</h2>
            @endif
       
         </div>
      </div>
   </div>

   <div class="global__cta">
      <div class="global__cta__inner__wrapp">
         <div class="content__wrapp">
            <div class="sub__heading">
               <h3>{{ $home_content->donation_title ?? '' }}</h3>
            </div>
            <h2>{{ $home_content->donation_subtitle ?? '' }}</h2>
            {!! $home_content->donation_content ?? '' !!}
            <div class="btn__wrapp"><a href="{{ route('showDynamicPage',$home_content->donation_btn_url) }}">{{ $home_content->donation_btn_label ?? '' }}</a></div>
         </div>
      </div>
   </div>

   <div class="bncp__blog__posts">
      <div class="container">
         <div class="heading__wrapp">
            <div class="heading__wrapp__inner">
               <div class="sub__heading">
                  <h3>{{ $home_content->blog_title ?? '' }}</h3>
               </div>
               <h2>{{ $home_content->blog_subtitle ?? '' }}</h2>
            </div>
            <div class="btn__wrapp"><a href="#">View All</a></div>
         </div>
         <div class="blog__post__inner">

            @if (count($blogs) > 0)
               @php
                  $count = 0;
               @endphp
               @foreach ($blogs as $key=>$blog)
               @php
                  if($key == 1)
                     break;
               @endphp
               <div class="blog__post__card blog__post__card__large">
                  <a href="#">
                     <div class="image__box">
                        <img src="{{ !empty($blog->image) ? asset('storage/blogs/'.$blog->image) : asset('frontend_assets/assets/images/default-image.png') }}" alt="{{ $blog->title }}">
                     </div>
                     <div class="blog__content">
                        <div class="blog__meta">
                           <ul>
                              <li>Olivia Rhye</li>
                              {{-- <li>20 Jan 2023</li> --}}
                              <li>{{ Carbon\Carbon::parse($blog->published_on)->format('M Y'); }}</li>
                           </ul>
                           <div class="blog__category">
                              <div class="category__tag">Presentation</div>
                              <div class="category__tag">Research</div>
                           </div>
                        </div>
                        <h3>{{ Str::words($blog->title,10) }}</h3>
                        {!! Str::words($blog->short_description,14) !!}
                     </div>
                  </a>
               </div>
            @endforeach
            @endif
            <div class="blog__post__card">
               @if (count($blogs) > 0)
               @php
                  $count = 0;
               @endphp
               @foreach ($blogs as $key=>$blog)
               @php
                  if($key == 0)
                     continue;
                  if($key == 3)
                     break;
               @endphp
               
               <div class="blog__post__card__small">
                  <a href="#">
                     <div class="small__blog__post__inner">
                     <div class="image__box">
                        <img src="{{ !empty($blog->image) ? asset('storage/blogs/'.$blog->image) : asset('frontend_assets/assets/images/default-image.png') }}" alt="{{ $blog->title }}">
                     </div>
                     <div class="blog__content">
                        <h3>{{ Str::words($blog->title,10) }}</h3>
                        <div class="blog__meta">
                           <ul>
                              <li>Olivia Rhye</li>
                              {{-- <li>20 Jan 2023</li> --}}
                              <li>{{ Carbon\Carbon::parse($blog->published_on)->format('M Y'); }}</li>
                           </ul>
                        </div>
                        {{-- <p>How do you create compelling presentations that wow your colleagues and impress your managers?</p> --}}
                        {!! Str::words($blog->short_description,14) !!}
                     </div>
                  </div>
                  </a>
               </div>
         
               @endforeach
               @endif
            </div>

         </div>
      </div>
   </div>

   <div class="faqs__wrapp">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $home_content->faq_title ?? '' }}</h3>
         </div>
         <h2>{{ $home_content->faq_subtitle ?? '' }} </h2>
         {!! $home_content->faq_content !!}
         <div class="accordion accordion__wrapp" id="accordionExample">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  @if (count($faqs) > 0)
                  @php $count = 0;@endphp
                  @foreach ($faqs as $count=>$faq)
                  @php
                   $count ++;
                   if($count == 5)
                     break; 
                  @endphp
                  <div class="accordion-item accordion__item">
                     <h2 class="accordion-header accordion__header" id="heading{{ $faq->id }}">
                        <button class="accordion-button accordion__button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">{{ $faq->question }}</button>
                     </h2>
                     <div id="collapse{{ $faq->id }}" class="accordion-collapse accordion__collapse collapse {{ $count == 1 ? 'show' : '' }}" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body accordion__body">
                           <p>{{ $faq->answer }}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @else
                     <h2>No data found!!</h2>
                  @endif

               </div>

               <div class="col-lg-6 col-md-6 454">

                  @if (count($faqs) > 0)
                  @php $count = 0;@endphp
                  @foreach ($faqs as $faq)
                  @php 
                     $count++;
                     if($count == 1 || $count == 2 || $count == 3 || $count == 4)
                        continue;
                  @endphp
                  <div class="accordion-item accordion__item">
                     <h2 class="accordion-header accordion__header" id="heading-{{ Str::slug($faq->question) }}">
                        <button class="accordion-button accordion__button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ Str::slug($faq->question) }}" aria-expanded="true" aria-controls="collapse-{{ Str::slug($faq->question) }}">{{ $faq->question }}</button>
                     </h2>
                     <div id="collapse-{{ Str::slug($faq->question) }}" class="accordion-collapse accordion__collapse collapse" aria-labelledby="heading-{{ Str::slug($faq->question) }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body accordion__body">
                           <p>{{ $faq->answer }}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @else
                     <h2>No data found!!</h2>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
@endsection