@extends('frontend.layouts.master')
@section('title','Account')
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
						<form action="{{ route('update-account') }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{-- {{ route('update-profile') }} --}}
							<div class="upload__user__photo">
								<div class="image-area image__area">
									<img id="imageResult" src="{{ !empty($user->profile_picture) ? asset('storage/users/'.$user->profile_picture) : asset('frontend_assets/assets/images/user-bg.svg')}}" alt="">
								</div>
								<div class="input__group">
									<input id="upload" name="profile_picture" type="file" onchange="readURL(this);" class="form-control form__control">
									<div class="input-group-append input__group__append">
										<label for="upload" class="upload__btn">Upload Photo</label>
									</div>
									{{-- <p>Pick a photo up to 4MB</p> --}}
								</div>
							</div>
							<div class="form__wrapp">
								<div class="form-group form__group">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<label>First Name</label>
											<input type="text" class="form-control form__control" name="first_name" value="{{ old('first_name', $user->first_name) ?? '' }}" placeholder="First Name" />
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<label>Last Name</label>
											<input type="text" class="form-control form__control" name="last_name" value="{{ old('last_name', $user->last_name) ?? '' }}" placeholder="Last Name" />
										</div>
									</div>
								</div>
								<div class="form-group form__group">
									<label>Email</label>
									<input type="email" class="form-control form__control" name="email" value="{{ old('email', $user->email ?? '')  }}" placeholder="Email" />
								</div>
								<div class="form-group form__group">
									<label>Phone Number</label>
									<input type="text" class="form-control form__control" name="mobile_number" value="{{ old('mobile_number',$user->mobile_number ?? '') }}" placeholder="Phone Number" />
								</div>
								<button class="submit__btn" type="submit">Save Changes</button>
							</div>
						</form>
						<div class="change__password">
							<h2>Email & Password</h2>
							{{-- <p>You can log in with john.doe@gmail.com and your password</p> --}}
							<a href="{{ route('edit-password') }}">Change Password</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection