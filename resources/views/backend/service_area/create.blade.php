@extends('backend.layouts.backendMasterLayout')
@section('title','Create Service Area')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Service Area</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.service-area.store') }}" method="POST">
                {{ csrf_field() }}
               @include('backend.service_area.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection