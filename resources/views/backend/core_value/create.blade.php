@extends('backend.layouts.backendMasterLayout')
@section('title','Create Core Value')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Core Value</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.core-value.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.core_value.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection