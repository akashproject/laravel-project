@extends('backend.layouts.backendMasterLayout')
@section('title','Fund Raiser')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Fund Raiser</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.fund-raiser.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.fund_raiser.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection