@extends('frontend.layouts.master')
@section('title','Refer Program')
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
                  <h1>Check for availability</h1>
                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release.</p>
                  <form action="{{ route('search-member-result') }}" method="POST">
                     {{ csrf_field() }}
                     <div class="form__wrapp">
                        <div class=" form__wrapp__inner">
                           <div class="form-group form__group">
                              <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control form__control" name="first_name" value="{{ old('first_name') }}" placeholder="Enter your first name" required />
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control form__control" name="last_name" value="{{ old('last_name') }}" placeholder="Enter your last name" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form__group">
                              <label>Email</label>
                              <input type="email" class="form-control form__control" name="email" value="{{ old('email') }}" placeholder="Enter your email" />
                           </div>
                           <div class="form-group form__group">
                              <label>Phone Number</label>
                              <input type="text" class="form-control form__control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Enter your phone number" />
                           </div>
                           <div class="form-group form__group">
                              <label>Organization Name</label>
                              <input type="text" class="form-control form__control" name="organization_name" value="{{ old('organization_name') }}" placeholder="Enter your organization name" />
                           </div>
                           <div class="form-group form__group">
                              <label>Location</label>
                              <input type="text" class="form-control form__control" name="location" value="{{ old('location') }}" placeholder="Enter your location" />
                           </div>
                        </div>
                        <button class="submit__btn submit__btn__with__color" type="submit">Search</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection