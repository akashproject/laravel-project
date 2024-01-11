<nav class="navbar navbar-expand-lg navbar__top">
   <div class="container">
      <a class="navbar-brand navbar___brand" href="{{ route('home') }}"><img src="{{!empty($setting['site_logo']) ? asset('storage/site_settings/'.$setting['site_logo']) : asset('frontend_assets/assets/images/default-image.png') }}" alt="{{ $setting['site_title'] ?? '' }}" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav navbar__nav">

            @isset($header_menus)
            @foreach ($header_menus as $key=>$menu)
            <li><a href="{{ route('showDynamicPage', $menu['link']) }}" {{ $menu['link'] == request()->segment(1) ? 'class=active' :
              (($menu['link'] == '/' && empty(request()->segment(1))) ? 'class=active' : '')}}>{{ $menu['label'] }}</a></li>
            @endforeach
            @endisset

            {{--  <li><a href="#">Home</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Programs</a></li>
                  <li><a href="#">Events</a></li>
                  <li><a href="#">Resources</a></li>
                  <li><a href="#">Products</a></li>
                  <li><a href="#">Contact Us</a></li>  --}}
         </ul>
      </div>
      <div class="nav__info__right">
         <form>
            <div class="form-group form__group">
               <i class="ico__box"><img src="{{asset('frontend_assets/assets/images/search.svg')}}" alt="" /></i>
               <input type="search" placeholder="Search Members" class="form-control form__control">
            </div>
         </form>
         <div class="donate__btn">
            <a href="{{ route('showDynamicPage', 'donation') }}">Donate Now</a>
         </div>
      </div>
   </div>
</nav>