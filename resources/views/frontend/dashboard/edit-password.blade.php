@extends('frontend.layouts.master')
@section('title','Edit Password')
@section('frontendContent')
<div class="body__content__main user__account__wrapp">
	<div class="user__profile__main">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-3">
					{{-- @include('frontend.dashboard.sidebar') --}}
				</div>
				<div class="col-lg-8 col-md-9">
					<div class="profile__details">
						<form action="{{ route('update-password') }}" method="POST">
							{{ csrf_field() }}
							<div class="form__wrapp">
								<div class="form-group form__group">
									<label>Current Password</label>
									<input type="password" class="form-control form__control" name="current_password" value="{{ old('current_password', $user->current_password) ?? '' }}" placeholder="Current Password" />
								</div>
								<div class="form-group form__group">
									<label>New Password</label>
									<input type="password" class="form-control form__control" name="new_password" value="{{ old('new_password', $user->new_password ?? '')  }}" placeholder="New Password" />
								</div>
								<div class="form-group form__group">
									<label>Confirm Password</label>
									<input type="password" class="form-control form__control" name="confirm_password" value="{{ old('confirm_password',$user->confirm_password ?? '') }}" placeholder="Confirm Password" />
								</div>
								<button class="submit__btn" type="submit">Update Password</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection