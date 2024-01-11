@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Strategic Priority')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Strategic Priority</h2>
         </div>
         <div class="card-body">
            <form action="{{ route('admin.strategic-priority.update', $strategicPriority) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.strategic_priority.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection