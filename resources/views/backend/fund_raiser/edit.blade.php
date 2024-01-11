@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Fund Raiser')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Fund Raiser</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.fund-raiser.update', $fundRaiser) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.fund_raiser.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection