@extends('backend.layouts.backendMasterLayout')
@section('title','Create Widget')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Widget</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.widget.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.widget.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection