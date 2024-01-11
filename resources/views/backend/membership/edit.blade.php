@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Membership')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Membership</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.membership.update', $membership) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.membership.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection