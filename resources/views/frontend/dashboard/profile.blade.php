@extends('frontend.layouts.master')
@section('title','Profile')
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
                        <form action="{{ route('update-profile') }}" method="POST">
                           {{ csrf_field() }}
                           <div class="form__wrapp">
                              <div class="form-group form__group">
                                 <label>About</label>
                                 <textarea class="form-control form__control" placeholder="Write about yourself" name="about_your_self">{{ old('about_your_self',$user->about_your_self ?? '') }}</textarea>
                              </div>
                              <div class="form-group form__group">
                                 <label>Date of Birth</label>
                                 <div class="input-group date input__group input__group__date" id="datepicker">
                                    <input type="text" class="form-control form__control" value="{{ old('dob', isset($user->dob) ? date('d/m/Y',strtotime($user->dob)) : '') }}" id="date" name="dob" placeholder="DD/MM/YYYY" />
                                    <span class="input-group-append input__group__append">
                                    <i class="ico__box"><img src="{{ asset('frontend_assets/assets/images/calendar-ico.svg') }}" alt="" /></i>
                                    </span>
                                 </div>
                              </div>
                              <div class="form-group form__group">
                                 <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                       <label>City</label>
                                       <input type="text" class="form-control form__control" name="city" value="{{ old('city', isset($user->city) ? $user->city : '') }}" placeholder="City" />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                       <label>Country</label>
                                       <input type="text" class="form-control form__control" name="country" value="{{ old('country', isset($user->country) ? $user->country : '') }}" placeholder="Country" />
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group form__group">
                                 <label>Other Contact Number</label>
                                 <input type="text" class="form-control form__control" name="other_contact_number" 
                                 value="{{ old('other_contact_number', isset($user->other_contact_number) ? $user->other_contact_number : '') }}" placeholder="Other Contact Number" />
                              </div>
                              <button class="submit__btn" type="submit">Save Changes</button>
                           </div>
                        </form>
                     </div>
                  </div>
			</div>
		</div>
	</div>
</div>
@endsection