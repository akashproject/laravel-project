@extends('frontend.layouts.master')
@section('title','Member Profile')
@section('frontendContent')
<div class="body__content__main user__account__wrapp">
   <div class="member__details__main">
      <div class="container">
         <div class="member__details__inner">
            <div class="member__profile">
               <div class="image__box">
                  <img src="{{ asset('frontend_assets/assets/images/profile-bg.png') }}" alt="" />
               </div>
               <div class="member__profile__avatar">
                  <img src="{{ !empty($user->profile_picture) ? asset('storage/users/'.$user->profile_picture) : asset('frontend_assets/assets/images/user-bg.svg')}}" alt="" />
               </div>
               <div class="member__card">
                  <h2>{{ $user->first_name.' '.$user->last_name }}</h2>
                  <ul>
                     {{-- <li>Founder, Orange Child Foundation</li> --}}
                     <li>{{ $user->role_name }}</li>
                     <li>{{ $user->membershipPlan->name }}</li>
                  </ul>
                  <div class="member__location">
                     <p>{{ $user->userDetails->address ?? ''  }}</p>
                  </div>
               </div>
            </div>
            <ul class="nav nav-tabs nav__tabs" id="myTab" role="tablist">
               <li class="nav-item nav__item" role="presentation">
                  <button class="nav-link nav__link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General Info</button>
               </li>
               <li class="nav-item nav__item" role="presentation">
                  <button class="nav-link nav__link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab" aria-controls="education" aria-selected="false">Education</button>
               </li>
               <li class="nav-item nav__item" role="presentation">
                  <button class="nav-link nav__link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" type="button" role="tab" aria-controls="company" aria-selected="false">Company Details</button>
               </li>
            </ul>
            <div class="tab-content tab__content" id="myTabContent">
               <div class="tab-pane tab__pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                  <div class="general__info__wrapp">
                     <div class="general__info__content">
                        <div class="info__heading">Email</div>
                        <div class="info__content">****************<a href="#">Show Email</a></div>
                     </div>
                     <div class="general__info__content">
                        <div class="info__heading">Phone Number</div>
                        <div class="info__content">****************<a href="#">Show Phone Number</a></div>
                     </div>
                     <div class="general__info__content members__details__content">
                        <div class="info__heading">About me</div>
                        <div class="info__content">{{ $user->userDetails->about_your_self ?? '' }}</div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane tab__pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                  <div class="general__info__wrapp">
                     <div class="general__info__content">
                        <div class="info__heading">University Name</div>
                        <div class="info__content">{{ $user->userDetails->university_name }}</div>
                     </div>
                     <div class="general__info__content">
                        <div class="info__heading">College Name</div>
                        <div class="info__content">{{ $user->userDetails->college_name }} </div>
                     </div>
                     <div class="general__info__content members__details__content">
                        <div class="info__heading">About Education</div>
                        <div class="info__content">Master of Technology (M.Tech), Reliability & Operations Research</div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane tab__pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                  <div class="general__info__wrapp">
                     <div class="general__info__content">
                        <div class="info__heading">Company Name</div>
                        <div class="info__content">{{ $user->userDetails->name_of_company ?? '' }}</div>
                     </div>
                     <div class="general__info__content">
                        <div class="info__heading">Company Turn Over</div>
                        <div class="info__content">{{ isset($user->userDetails->company_turn_over) ? '$'.$user->userDetails->company_turn_over : ''}}</div>
                     </div>
                     <div class="general__info__content members__details__content">
                        <div class="info__heading">No of Eployee</div>
                        <div class="info__content">{{ $user->userDetails->number_of_employee ?? '' }}</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection