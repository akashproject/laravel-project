@extends('backend.layouts.backendMasterLayout')
@section('title','Create Banner')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Banner</h2>
            {{-- <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a> --}}
         </div>
         <div class="card-body">
            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.banner.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection