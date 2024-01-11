@extends('frontend.layouts.master')
@section('frontendContent')
<div class="body__content__main">

   {{-- Start Who We section --}}
   <div class="about__bncp__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="sub__heading">
                  <h3>Refer A Member</h3>
               </div>

               <form action="{{ route('search-member') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group ">
                     <label>First Name</label>
                     <input type="text" name="first_name" class="form-control" placeholder="First Name" required value="{{ old('first_name') }}" required>
                  </div>
                  <div class="form-group ">
                     <label>Last Name</label>
                     <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required>
                  </div>
                  <div class="form-group ">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                  </div>
                  <div class="form-group">
                     <label>Phone Number</label>
                     <input type="text" name="mobile_number" class="form-control" placeholder="Phone Number" value="{{ old('mobile_number') }}" required>
                  </div>
                  {{-- <div class="form-group ">
                     <label>Organization Name</label>
                     <input type="text" name="organization_name" class="form-control" placeholder="Organization Name" value="{{ old('') }}">
                  </div> --}}
                  <div class="form-group ">
                     <label>Location</label>
                     <input type="text" name="location" class="form-control" placeholder="Location" value="{{ old('location') }}" required>
                  </div> 

                  <div class="form-group mt-2">
                     <label></label>
                     <input type="submit" value="Search" class="btn btn-primary">
                  </div>
               </form>

               @if (Session::has('error'))
                  <div class="alert alert-danger mt-4">
                     {{ Session::get('error') }}
                  </div>
               @endif

               @if (Session::has('success'))
                  <div class="alert alert-success mt-4">
                     {{ Session::get('success') }}
                  </div>
               @endif

               {{-- @if ($users->count())
               @foreach ($users as $user)
                  <div>sam</div>
               @endforeach
               @endif --}}
               
            </div>
         </div>
      </div>
   </div>
   {{-- Start Who We section --}}

</div>
@endsection