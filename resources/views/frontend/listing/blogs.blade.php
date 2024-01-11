<div class="body__content__main">
   @if (!empty($blogs))
   <div class="container">
      <div class="sub__heading">
         <h3>{{ $page_content->blog_list_title ?? '' }}</h3>
      </div>
      <h2>{{ $page_content->blog_list_subtitle ?? '' }}</h2>
      <div class="blog__list__main">
         <div class="row">
            <div class="col-lg-8 col-md-8">
               <div class="blog__cards">
                @if (count($blogs) > 0)
                @foreach ($blogs as $key=>$blog)
                @php
                  if($key == 6)
                    break;
                @endphp
                  <div class="blog__card">
                     <div class="image__box">
                        <a href="#"><img src="{{ !empty($blog->image) ? asset('storage/blogs/'.$blog->image) : asset('frontend_assets/assets/images/default-image.png') }}" alt="{{ $blog->title }}" /></a>
                        <div class="category__tag">{{ $blog->membershipPlan->name }}</div>
                     </div>
                     <div class="card__content">
                        <div class="blog__meta">
                           <ul>
                              <li>
                                 <a href="#">
                                    <div class="author__pic"><img src="assets/images/author-pic.png" alt="" /></div>
                                    Annette Black
                                 </a>
                              </li>
                              {{-- <li><a href="#">14 April, 2023</a></li> --}}
                              <li><a href="#">{{ Carbon\Carbon::parse($blog->published_on)->format('M Y'); }}</a></li>
                              <li></li>
                           </ul>
                        </div>
                        <h3><a href="#">{{ Str::words($blog->title,14) }}</a></h3>
                        {!! Str::words($blog->short_description,18) !!}
                        <div class="btn__wrapp"><a href="#">Read More</a></div>
                     </div>
                  </div>
                  @endforeach
                @endif
                  
               </div>
            </div>
            <div class="col-lg-4 col-md-4">
               <div class="side__bar__wrapp">
                  <ul>
                    @if (count($blogs) > 0)
                    @foreach ($blogs as $key=>$blog)
                    @php
                      if($key == 3)
                         break;
                    @endphp
                     <li>
                        <h3><a href="#">{{ Str::words($blog->title,10) }}</a></h3>
                        {!! Str::words($blog->short_description,14) !!}
                        <div class="btn__wrapp"><a href="#">Read More</a></div>
                     </li>
                    @endforeach
                    @endif
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif
   @if (!empty($programs))
   <div class="bncp__program">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $page_content->program_list_title ?? '' }}</h3>
         </div>
         <h2>{{ $page_content->program_list_subtitle ?? '' }}</h2>
         <div class="owl-carousel owl-theme program__slider">
            @if (count($programs) > 0)
            @foreach ($programs as $program)
            <div class="item">
               <div class="program__card">
                  <div class="image__box"><img src="{{ !empty($program->image) ? asset('storage/programs/'.$program->image) : asset('frontend_assets/assets/default-image.png') }}" alt="{{ $program->title }}" alt="" /></div>
                  <div class="card__content">
                     <h3>{{ $program->title }}</h3>
                     {!! Str::words($program->short_description,19) !!}
                     <div class="card__meta">
                        <i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/clock-ico.svg') }}" alt="" /></i>
                        <ul>
                           <li>{{ Carbon\Carbon::parse($program->program_date)->format('d M Y'); }}</li>
                           @php
                              $time = date('h:i A',strtotime($program->from_date)).' - '.date('h:i A',strtotime($program->to_date));
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
                        <a href="{{ $program->slug }}">Join Now</a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            @endif
         </div>
      </div>
   </div>
   @endif
   @if (!empty($events))
   <div class="bncp__events">
      <div class="container">
         <div class="sub__heading">
            <h3>{{ $page_content->event_list_title ?? '' }}</h3>
         </div>
         <h2>{{ $page_content->event_list_subtitle ?? '' }}</h2>
         <div class="events__wrapp">
            @if (count($events) > 0)
            @foreach ($events as $key=>$event)
            @php
                if($key == 3)
                    break;
            @endphp
            <div class="event__card">
               {{-- <div class="event__date">04<span>November 2023</span></div> --}}
               <div class="event__date">{{ Carbon\Carbon::parse($event->event_date)->format('d'); }}<span>{{ Carbon\Carbon::parse($event->event_date)->format('M Y'); }}</span></div>
               <div class="image__box"><img src="{{ !empty($event->image) ? asset('storage/events/'.$event->image) : asset('frontend_assets/assets/default-image.png') }}" alt="{{ $event->title }}"></div>
               <div class="event__content">
                  <h3>{{ $event->title }}</h3>
                  <p>{!! Str::words($event->short_description,19) !!} </p>
                  <div class="event__meta">
                     <div class="event__time"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/clock-ico.svg') }}" alt="" /></i>
                        {{-- 10:00 AM - 06:00 PM --}}
                           @php
                              $time = date('h:i A',strtotime($event->from_date)).' - '.date('h:i A',strtotime($event->to_date));
                           @endphp
                           {{ $time }}
                     </div>
                     <div class="event__location"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/location-ico.svg') }}" alt="" /></i>{{ $event->location }}</div>
                  </div>
               </div>
               <div class="btn__wrapp"><a href="{{ $event->slug }}">Learn More</a></div>
            </div>
            @endforeach
            @endif
       
         </div>
      </div>
   </div>
   @endif
</div>