{{-- <div class="main__banner main__banner__inner">
   <div class="bannre__content">
      <div class="container">
         <div class="bannre__content__inner__wrapp">
            <div class="breadcrumb__wrapp">
               <ul>
                  <li><a href="#"><i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/home-ico.svg') }}" alt="" /></i>Home</a></li>
                  <li>Contact Us</li>
               </ul>
            </div>
            <h1>Contact Us</h1>
            <p>Connect with the BNCEP community at conferences, meetups, and hackathons around the world.</p>
         </div>
      </div>
   </div>
</div> --}}

<div class="main__banner main__banner__inner">
   <div class="bannre__content">
      <div class="container">
         <div class="bannre__content__inner__wrapp">
            <div class="breadcrumb__wrapp">
               <ul>
                  <li><a href="{{ route('home') }}"><i class="ico__box"><img src="assets/images/home-ico.svg" alt="" /></i>{{ $widget->bread_crumb_title ?? '' }}</a></li>
                  <li><a href="{{ route('showDynamicPage',strtolower($widget->bread_crumb_subtitle)) }}">{{ $widget->bread_crumb_subtitle ?? '' }}</a></li>
                  <li>{{ $widget->name ?? '' }}</li>
               </ul>
            </div>
            {!! Str::words($widget->bread_crumb_content ?? '',13) !!}
         </div>
      </div>
   </div>
</div>