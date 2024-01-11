@extends('frontend.layouts.authMaster')
@section('title', $page->title)
@section('content')
<div class="form__body">
   <div class="form__holder">
      <div class="form__banner__wrapp">
         <div class="image__wrapp">
            <img src="{{!empty($page_content->registration_image) ? asset('/'.$page_content->registration_image) : asset('frontend_assets/assets/images/default-image.png') }}" />
         </div>
         <div class="banner__content">
            <div class="content__wrapp">
               {{-- <h1><span>"</span>Fostering connections with individuals and organizations that share common goals and values</h1> --}}
               {!! $page_content->registration_image_content ?? '' !!}
               {{-- <div class="title__wrapp">
                  <h3>Annette Black</h3>
                  <p>BNCEP Academy</p>
               </div> --}}
            </div>
         </div>
      </div>
      <div class="form__content">
         <div class="brand__wrapp">
            <img src="{{!empty($setting['site_logo']) ? asset('storage/site_settings/'.$setting['site_logo']) : asset('frontend_assets/assets/images/default-image.png') }}" alt="{{ $setting['site_title'] ?? '' }}" />
         </div>
         <div class="content__wrapp">
            <h2>{{ $page_content->registration_title ?? '' }}</h2>
            {!! $page_content->registration_content !!}
         </div>
         <div class="form__wrapp">
            <form action="{{ route('register') }}" method="POST">
               {{ csrf_field() }}
               <div class="form-group form__group">
                  <label>Sign up as a</label>
                  <select class="selectpicker form-control form__control" name="membership">
                     @if ($members->count())
                        @foreach ($members as $member)
                           <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                     @endif
                  </select>
               </div>

               <div class="form-group form__group">
                  <label>Full Name</label>
                  <input type="text" name="fullname" value="{{ old('fullname') }}" class="form-control form__control" placeholder="Enter your full name" />
               </div>

               <div class="form-group form__group">
                  <label>Role</label>
                  <input type="text" name="role_name" value="{{ old('role_name') }}" class="form-control form__control" placeholder="Enter your role" />
               </div>

               <div class="form-group form__group">
                  <label>Email</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control form__control" placeholder="Enter your email" />
               </div>

               <div class="form-group form__group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control form__control" placeholder="Enter your password" />
               </div>

               <div class="form-group form__group">
                  <label>Organization Name</label>
                  <input type="text" name="organization_name" value="{{ old('organization_name') }}" class="form-control form__control" placeholder="Enter your organization name" />
               </div>

               <div class="form-group form__group">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <label>Organization Size</label>
                        <input type="text" name="organization_size" value="{{ old('organization_size') }}" class="form-control form__control" placeholder="Organization size" />
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <label>Organization Budget</label>
                        <input type="text" name="organization_budget" value="{{ old('organization_budget') }}" class="form-control form__control" placeholder="Organization Budget" />
                     </div>
                  </div>
               </div>

               <div class="form-group form__group">
                  <label>Service Areas</label>
                  <select class="selectpicker form-control form__control" name="service_area">
                     <option selected disabled>- Select Service Areas -</option>
                     @if ($service_areas->count())
                        @foreach ($service_areas as $service_area)
                           <option value="{{ $service_area->id }}">{{ $service_area->name }}</option>
                        @endforeach
                     @endif
                  </select>
               </div>

               <div class="form-group form__group">
                  <label>Focus Areas</label>
                  <input type="text" name="focus_area" value="{{ old('focus_area') }}" class="form-control form__control" placeholder="Enter your focus areas" />
               </div>
               
               <div class="form-group form__group">
                  <div class="input-group input__group">
                     <label class="checkbox" for="cart-1">
                     <input type="checkbox" class="crat__check" name="color" checked="checked" value="cart-1" id="cart-1">
                     <span class="checkmark"></span>Commitment to sharing impact data</label>
                  </div>
               </div>
               <input type="hidden" name="referrer" value="{{ $referrer_user->email ?? '' }}">
               <button class="submit__btn" type="submit">Register</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection