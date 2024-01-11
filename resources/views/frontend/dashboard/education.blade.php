@extends('frontend.layouts.master')
@section('title','Education')
@section('frontendContent')
<div class="body__content__main user__account__wrapp">
   <div class="user__profile__main">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-3">
               @include('frontend.dashboard.sidebar')
            </div>
            <div class="col-lg-8 col-md-9">
               <div class="profile__details">
                  <p>Let BNCEP members get to know you by personalizing your profile.</p>
                  <form action="{{ route('update-education') }}" method="POST">
                     {{ csrf_field() }}
                     <div class="form__wrapp">
                        <div class="form-group form__group">
                           <label>University</label>
                           <input type="text" class="form-control form__control" name="university_name" value="{{ old('university_name', isset($user->university_name) ? $user->university_name : '' ) }}" placeholder="University name" />
                        </div>
                        <div class="form-group form__group">
                           <label>College</label>
                           <input type="text" class="form-control form__control" name="college_name" value="{{ old('college_name', isset($user->college_name) ? $user->college_name : '' ) }}" placeholder="College name" />
                        </div>

                        <div class="form-group form__group">
                           <label>About Education</label>
                           <textarea class="form-control form__control" name="about_education" placeholder="About Education">{{ old('about_education', isset($user->about_education) ? $user->about_education : '' ) }}</textarea>
                        </div>

                        


                        {{-- <div id="more-input"></div>
                        <div class="btn__wrapp">
                           <button id="addinput" class="more__btn add__btn">
                              <i class="ico__box">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                    <path d="M13 8.5H8V13.5C8 13.7652 7.89464 14.0196 7.70711 14.2071C7.51957 14.3946 7.26522 14.5 7 14.5C6.73478 14.5 6.48043 14.3946 6.29289 14.2071C6.10536 14.0196 6 13.7652 6 13.5V8.5H1C0.734784 8.5 0.48043 8.39464 0.292893 8.20711C0.105357 8.01957 0 7.76522 0 7.5C0 7.23478 0.105357 6.98043 0.292893 6.79289C0.48043 6.60536 0.734784 6.5 1 6.5H6V1.5C6 1.23478 6.10536 0.980429 6.29289 0.792893C6.48043 0.605357 6.73478 0.5 7 0.5C7.26522 0.5 7.51957 0.605357 7.70711 0.792893C7.89464 0.980429 8 1.23478 8 1.5V6.5H13C13.2652 6.5 13.5196 6.60536 13.7071 6.79289C13.8946 6.98043 14 7.23478 14 7.5C14 7.76522 13.8946 8.01957 13.7071 8.20711C13.5196 8.39464 13.2652 8.5 13 8.5Z" fill="#F68F34"/>
                                 </svg>
                              </i>
                              Add Education
                           </button>
                           <button id="removeinput" class="more__btn remove__btn">
                              <i class="ico__box">
                                 <svg width="14" height="2" viewBox="0 0 14 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="14" height="2" rx="1" fill="#ff7b7b"/>
                                 </svg>
                              </i>
                              Remove Education
                           </button>
                        </div> --}}
                        <button class="submit__btn" type="submit">Save Changes</button>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection