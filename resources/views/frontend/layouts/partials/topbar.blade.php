<div class="top__header">
   <div class="container">
      <div class="top__header__inner">
         <div class="top__contact__info">
            <div class="contact__info__inner">
               @isset ($setting['site_email'])
               <a href="#"><i class="ico__box"><img src="{{asset('frontend_assets/assets/images/email-ico.svg')}}" alt="" /></i><span>{{ $setting['site_email'] }}</span></a>
               @endisset
            
            </div>
            <div class="contact__info__inner">
               @isset ($setting['site_mobile'])
               <a href="#"><i class="ico__box"><img src="{{asset('frontend_assets/assets/images/call-ico.svg')}}" alt="" /></i><span>{{ $setting['site_mobile'] }}</span></a>
               @endisset
            </div>
         </div>
         <div class="user__info">
            <div class="user__account">
               <ul>
                  @if (Auth::check())
                     <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                        </a>
                      </li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                     <li><a href="{{ route('account') }}">Account</a></li>

                  @else
                     <li><a href="{{ route('login') }}">Login</a></li>
                     <li><a href="{{ route('register') }}">Sign Up</a></li>
                  @endif
                  
                  
               </ul>
            </div>
            <div class="social__links">
               <ul>
                  @isset ($setting['instagram_link'])
                     <li><a href="{{ $setting['instagram_link'] }}" target="_blank"><i class="ico__box"><img src="{{asset('frontend_assets/assets/images/youtube.svg')}}" alt="" /></i></a></li>
                  @endisset
                  @isset ($setting['facebook_link'])
                     <li><a href="{{ $setting['facebook_link'] }}" target="_blank"><i class="ico__box"><img src="{{asset('frontend_assets/assets/images/facebook.svg')}}" alt="" /></i></a></li>
                  @endisset
                  @isset ($setting['instagram_link'])
                     <li><a href="{{ $setting['instagram_link'] }}" target="_blank"><i class="ico__box"><img src="{{asset('frontend_assets/assets/images/instagram.svg')}}" alt="" /></i></a></li>
                  @endisset
                  @isset ($setting['twitter_link'])
                     <li><a href="{{ $setting['twitter_link'] }}" target="_blank"><i class="ico__box"><img src="{{asset('frontend_assets/assets/images/twitter.svg')}}" alt="" /></i></a></li>
                  @endisset   
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>