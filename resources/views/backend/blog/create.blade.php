@extends('backend.layouts.backendMasterLayout')
@section('title','Create Blog')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Blog</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.blog.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection