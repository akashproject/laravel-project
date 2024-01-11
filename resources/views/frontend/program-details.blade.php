@extends('frontend.layouts.master')
@section('title',$program->title)
@section('frontendContent')
@include('frontend.layouts.common.common-banner-section')

<div class="body__content__main">
   <div class="event__details__wrapp">
      <div class="container">
         <div class="event__details__card">
            <div class="image__box">
               <img src="{{ !empty($program->image) ? asset('storage/programs/'.$program->image) : asset('frontend_assets/assets/images/default-image.png') }}" alt="">

            </div>
            <div class="event__content">
               <div class="event__category__tag">BNCEP Mobilizers</div>
               <div class="event__meta">
                  <ul>
                     <li>
                        <i class="ico__box">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M12 2C7.03125 2 3 6.03125 3 11C3 15.9688 7.03125 20 12 20C16.9688 20 21 15.9688 21 11C21 6.03125 16.9688 2 12 2Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10"/>
                              <path d="M12 5V11.75H16.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>
                        </i>
                        {{-- Wed, Jul 5, 10:00 AM - 06:00 PM --}}
                        @php
                           $time = date('h:i A',strtotime($program->from_date)) .' - '.date('h:i A',strtotime($program->to_date));
                        @endphp
                        {{ Carbon\Carbon::parse($program->program_date)->format('D, M d,'); }}  {{ $time }}

                     </li>
                     <li class="reserve__seat">
                        <i class="ico__box">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M8.5 10.729C6.4715 11.366 5 13.2615 5 15.5C5 18.2615 7.2385 20.5 10 20.5C10.878 20.5009 11.7407 20.2703 12.5011 19.8314C13.2615 19.3924 13.8927 18.7607 14.331 18" stroke="#F68F34" stroke-width="1.5" stroke-linecap="round"/>
                              <path d="M19 10C17 10 15.25 9.75 12 8.5V14.5H19V21.5" stroke="#F68F34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M12 6C13.1046 6 14 5.10457 14 4C14 2.89543 13.1046 2 12 2C10.8954 2 10 2.89543 10 4C10 5.10457 10.8954 6 12 6Z" stroke="#F68F34" stroke-width="1.5"/>
                           </svg>
                        </i>
                        Only 24 Seat left
                     </li>
                  </ul>
               </div>
               <h3>{{ $program->title }}</h3>
               <div class="event__card__footer">
                  <a href="javascript::void(0)" data-bs-toggle="modal" data-bs-target="#programModalHaveMembership">Register Now</a>
                  <div class="evemt__share">
                     <a href="#">
                        <i class="ico__box">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M18 22C17.1667 22 16.4583 21.7083 15.875 21.125C15.2917 20.5417 15 19.8333 15 19C15 18.8833 15.0083 18.7623 15.025 18.637C15.0417 18.5117 15.0667 18.3993 15.1 18.3L8.05 14.2C7.76667 14.45 7.45 14.646 7.1 14.788C6.75 14.93 6.38333 15.0007 6 15C5.16667 15 4.45833 14.7083 3.875 14.125C3.29167 13.5417 3 12.8333 3 12C3 11.1667 3.29167 10.4583 3.875 9.875C4.45833 9.29167 5.16667 9 6 9C6.38333 9 6.75 9.071 7.1 9.213C7.45 9.355 7.76667 9.55067 8.05 9.8L15.1 5.7C15.0667 5.6 15.0417 5.48767 15.025 5.363C15.0083 5.23833 15 5.11733 15 5C15 4.16667 15.2917 3.45833 15.875 2.875C16.4583 2.29167 17.1667 2 18 2C18.8333 2 19.5417 2.29167 20.125 2.875C20.7083 3.45833 21 4.16667 21 5C21 5.83333 20.7083 6.54167 20.125 7.125C19.5417 7.70833 18.8333 8 18 8C17.6167 8 17.25 7.92933 16.9 7.788C16.55 7.64667 16.2333 7.45067 15.95 7.2L8.9 11.3C8.93333 11.4 8.95833 11.5127 8.975 11.638C8.99167 11.7633 9 11.884 9 12C9 12.1167 8.99167 12.2377 8.975 12.363C8.95833 12.4883 8.93333 12.6007 8.9 12.7L15.95 16.8C16.2333 16.55 16.55 16.3543 16.9 16.213C17.25 16.0717 17.6167 16.0007 18 16C18.8333 16 19.5417 16.2917 20.125 16.875C20.7083 17.4583 21 18.1667 21 19C21 19.8333 20.7083 20.5417 20.125 21.125C19.5417 21.7083 18.8333 22 18 22Z" fill="#F68F34"/>
                           </svg>
                        </i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="event__details__content">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-7">
                  {!! $program->long_description ?? '' !!}
               </div>
               <div class="col-lg-4 col-md-4 col-sm-5">
                  <div class="sidebar__wrapp">
                     <div class="sidebar__widget">
                        <h3>About this Program</h3>
                        <ul>
                           <li>
                              <i class="ico__box">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M29 21.25H27.75V9C27.75 8.27065 27.4603 7.57118 26.9445 7.05546C26.4288 6.53973 25.7293 6.25 25 6.25H7C6.27065 6.25 5.57118 6.53973 5.05546 7.05546C4.53973 7.57118 4.25 8.27065 4.25 9V21.25H3C2.80109 21.25 2.61032 21.329 2.46967 21.4697C2.32902 21.6103 2.25 21.8011 2.25 22V24C2.25 24.7293 2.53973 25.4288 3.05546 25.9445C3.57118 26.4603 4.27065 26.75 5 26.75H27C27.7293 26.75 28.4288 26.4603 28.9445 25.9445C29.4603 25.4288 29.75 24.7293 29.75 24V22C29.75 21.8011 29.671 21.6103 29.5303 21.4697C29.3897 21.329 29.1989 21.25 29 21.25ZM5.75 9C5.75 8.66848 5.8817 8.35054 6.11612 8.11612C6.35054 7.8817 6.66848 7.75 7 7.75H25C25.3315 7.75 25.6495 7.8817 25.8839 8.11612C26.1183 8.35054 26.25 8.66848 26.25 9V21.25H5.75V9ZM28.25 24C28.25 24.3315 28.1183 24.6495 27.8839 24.8839C27.6495 25.1183 27.3315 25.25 27 25.25H5C4.66848 25.25 4.35054 25.1183 4.11612 24.8839C3.8817 24.6495 3.75 24.3315 3.75 24V22.75H28.25V24ZM18.75 11C18.75 11.1989 18.671 11.3897 18.5303 11.5303C18.3897 11.671 18.1989 11.75 18 11.75H14C13.8011 11.75 13.6103 11.671 13.4697 11.5303C13.329 11.3897 13.25 11.1989 13.25 11C13.25 10.8011 13.329 10.6103 13.4697 10.4697C13.6103 10.329 13.8011 10.25 14 10.25H18C18.1989 10.25 18.3897 10.329 18.5303 10.4697C18.671 10.6103 18.75 10.8011 18.75 11Z" fill="black"/>
                                 </svg>
                              </i>
                              <div class="event__info">
                                 {{ $program->program_type }}
                              </div>
                           </li>
                           <li>
                              <i class="ico__box">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M5.82422 15.328H26.2082V16.672H5.82422V15.328Z" fill="black"/>
                                    <path d="M10.2405 30.048L8.89648 15.328H23.1045L21.7605 30.048L20.4165 29.952L21.6325 16.672H10.3685L11.5845 29.952L10.2405 30.048ZM20.4805 13.44H19.1365C19.1365 11.712 17.7285 10.304 16.0005 10.304C14.2725 10.304 12.8645 11.712 12.8645 13.44H11.5205C11.5205 10.976 13.5365 8.95999 16.0005 8.95999C18.4645 8.95999 20.4805 10.976 20.4805 13.44ZM16.0005 7.74399C14.2405 7.74399 12.8005 6.30399 12.8005 4.54399C12.8005 2.78399 14.2405 1.34399 16.0005 1.34399C17.7605 1.34399 19.2005 2.78399 19.2005 4.54399C19.2005 6.30399 17.7605 7.74399 16.0005 7.74399ZM16.0005 2.65599C14.9765 2.65599 14.1125 3.48799 14.1125 4.54399C14.1125 5.56799 14.9445 6.43199 16.0005 6.43199C17.0245 6.43199 17.8885 5.59999 17.8885 4.54399C17.8885 3.51999 17.0245 2.65599 16.0005 2.65599Z" fill="black"/>
                                    <path d="M24.3196 16H22.9756V9.91999L20.6076 7.55199L21.5676 6.62399L24.3196 9.37599V16ZM8.35156 29.344H23.6476V30.688H8.35156V29.344Z" fill="black"/>
                                 </svg>
                              </i>
                              <div class="event__info">{{ $program->organizer_name }}</div>
                           </li>
                           <li>
                              <i class="ico__box">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M16 16.6667C15.0111 16.6667 14.0444 16.3734 13.2222 15.824C12.3999 15.2746 11.759 14.4937 11.3806 13.5801C11.0022 12.6664 10.9031 11.6611 11.0961 10.6912C11.289 9.7213 11.7652 8.83039 12.4645 8.13113C13.1637 7.43186 14.0546 6.95566 15.0246 6.76273C15.9945 6.56981 16.9998 6.66882 17.9134 7.04726C18.8271 7.4257 19.6079 8.06656 20.1574 8.88881C20.7068 9.71105 21 10.6778 21 11.6667C20.9984 12.9923 20.4711 14.2631 19.5338 15.2004C18.5964 16.1378 17.3256 16.6651 16 16.6667ZM16 8.66666C15.4067 8.66666 14.8266 8.84261 14.3333 9.17225C13.8399 9.50189 13.4554 9.97043 13.2284 10.5186C13.0013 11.0668 12.9419 11.67 13.0576 12.2519C13.1734 12.8339 13.4591 13.3684 13.8787 13.788C14.2982 14.2075 14.8328 14.4933 15.4147 14.609C15.9967 14.7248 16.5999 14.6654 17.1481 14.4383C17.6962 14.2112 18.1648 13.8267 18.4944 13.3334C18.8241 12.84 19 12.26 19 11.6667C18.9992 10.8713 18.6829 10.1087 18.1204 9.54622C17.558 8.98378 16.7954 8.66745 16 8.66666Z" fill="black"/>
                                    <path d="M16 28.6667L7.56401 18.7177C7.44679 18.5683 7.33079 18.4179 7.21601 18.2667C5.77499 16.3684 4.99652 14.0499 5.00001 11.6667C5.00001 8.74928 6.15894 5.95138 8.22184 3.88848C10.2847 1.82558 13.0826 0.666656 16 0.666656C18.9174 0.666656 21.7153 1.82558 23.7782 3.88848C25.8411 5.95138 27 8.74928 27 11.6667C27.0035 14.0488 26.2254 16.3663 24.785 18.2637L24.784 18.2667C24.784 18.2667 24.484 18.6607 24.439 18.7137L16 28.6667ZM8.81201 17.0617C8.81401 17.0617 9.04601 17.3697 9.09901 17.4357L16 25.5747L22.91 17.4247C22.954 17.3697 23.188 17.0597 23.189 17.0587C24.3662 15.5078 25.0023 13.6137 25 11.6667C25 9.27971 24.0518 6.99052 22.364 5.3027C20.6761 3.61487 18.387 2.66666 16 2.66666C13.6131 2.66666 11.3239 3.61487 9.63605 5.3027C7.94822 6.99052 7.00001 9.27971 7.00001 11.6667C6.99791 13.6149 7.63379 15.5101 8.81201 17.0617Z" fill="black"/>
                                 </svg>
                              </i>
                              <div class="event__info">{{ $program->location }}</div>
                           </li>
                           <li>
                              <i class="ico__box">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M16 4C9.375 4 4 9.375 4 16C4 22.625 9.375 28 16 28C22.625 28 28 22.625 28 16C28 9.375 22.625 4 16 4Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10"/>
                                    <path d="M16 8V17H22" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </i>
                              <div class="event__info">Date & Time<span> {{ Carbon\Carbon::parse($program->event_date)->format('D, M d,'); }}  {{ $time }} </span></div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- Modal -->
<div class="modal fade" id="programModalHaveMembership" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Do you have a membership?</h3>
        <hr>
        <p>Enjoy a personalized experience, connect with a community of like-mind individuals, and delve into a world where your interests take center stage.</p>
      </div>
      <div class="modal-footer">
        <a href="javascript::void(0)" data-bs-toggle="modal" data-bs-target="#programModalJoinAsMember">No</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Yes, I have</a>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="programModalJoinAsMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Do you want to join as a member?</h3>
        <hr>
        <p>As a member, you gain access to a world of opportunities, special privileges, and a community that share your interests. So you are ready to join the club?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#programModalWithoutMembership">No</button>
        <a href="{{ route('register') }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="programModalWithoutMembership" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Sorry you cannot join this event without a membership</h3>
        <hr>
        <p>Unfortunately, access to this event is reserved for members only. Your entry requires the accompaniment of a member. We appologize for any convenience and hope you understand the exclusivity of this gathering. If you're keen on joining, perhaps consider becoming a member to enjoy future events and all the associated perks.</p>
      </div>
      <div class="modal-footer">
        <a href="{{ route('home') }}" class="btn btn-secondary">Back To Home</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
      </div>
    </div>
  </div>
</div>
@endsection
