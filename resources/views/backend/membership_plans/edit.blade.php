@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Plan')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Membership Plan</h2>
            {{-- <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a> --}}
         </div>
         <div class="card-body">
            <form action="{{ route('admin.membership-plans.update', $membershipPlan) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.membership_plans.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection