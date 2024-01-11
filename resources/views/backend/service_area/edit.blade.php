@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Service Area')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Service Area</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.service-area.update', $serviceArea) }}" method="POST">
                {{ csrf_field() }}
               @include('backend.service_area.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection