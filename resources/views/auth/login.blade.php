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
            <form action="{{ route('login') }}" method="POST">
               {{ csrf_field() }}

               <div class="form-group form__group">
                  <label>Email<span>*</span></label>
                  <input type="email" name="email"  value="{{ old('email') }}" class="form-control form__control @error('email') is-invalid @enderror" placeholder="Enter your email" />
               </div>

               <div class="form-group form__group">
                  <label>Password<span>*</span></label>
                  <input type="password" name="password" class="form-control form__control @error('password') is-invalid @enderror" placeholder="Enter your password" />
               </div>
               
               <div class="form-group form__group">
                  <div class="input-group input__group">
                     <label class="checkbox" for="remember">
                     <input class="crat__check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                     <span class="checkmark"></span>Remember for 30 days</label>
                  </div>
               </div>
               <button class="submit__btn" type="submit">Login</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
