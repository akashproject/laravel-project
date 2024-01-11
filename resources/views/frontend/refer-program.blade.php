@extends('frontend.layouts.master')
@section('frontendContent')
<div class="body__content__main">

   {{-- Start Who We section --}}
   <div class="about__bncp__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="sub__heading">
                  <h3>Refer A Program</h3>
               </div>

               <form action="{{ route('send-refer-member-mail') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group ">
                     <label>Full Name</label>
                     <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                  </div>

                  <div class="form-group ">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                  
                  <div class="form-group">
                     <label></label>
                     <input type="submit" value="Invite" class="btn btn-primary">
                  </div>
               </form>
               
            </div>
         </div>
      </div>
   </div>
   {{-- Start Who We section --}}

</div>
@endsection