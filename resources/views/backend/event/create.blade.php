@extends('backend.layouts.backendMasterLayout')
@section('title','Create Event')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Event</h2>
            {{-- <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a> --}}
         </div>
         <div class="card-body">
            <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.event.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection