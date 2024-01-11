@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Blog')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Blog</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.blog.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection