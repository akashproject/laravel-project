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

               <form action="{{ route('send-refer-member-mail') }}" method="POST">
                  {{ csrf_field() }}
                  {{-- <div class="form-group ">
                     <label>Full Name</label>
                     <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                  </div> --}}

                 
                     <input type="hidden" name="email" value="{{ $requestData['email'] }}" class="form-control" placeholder="Email">
                     <input type="hidden" name="fullname" value="{{ $requestData['fullname'] }}" class="form-control" placeholder="fullname">
           
                  
                  <div class="form-group mt-2">
                     <label></label>
                     <input type="submit" value="Invite" class="btn btn-primary">
                  </div>
               </form>
               <br>
               {{-- @if ($users->count())
               @foreach ($users as $user)
                  <div>
                     Name: {{ $user->first_name }}
                     <a href="#" class="btn btn-primary mt-2">Invite</a>
                  </div>
               @endforeach
               @endif --}}
            </div>
         </div>
      </div>
   </div>
   {{-- Start Who We section --}}

</div>
@endsection