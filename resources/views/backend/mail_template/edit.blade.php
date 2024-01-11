@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Mail Template')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Mail Template</h2>
         </div>
         <div class="card-body">
         
          <form class="forms-sample" action="{{route('admin.mail-template.update', $mailTemplate)}}" method="POST" autocomplete="off">
            @csrf
            @method('PATCH')

            @include('backend.mail_template.form')

          </form>
         </div>
      </div>
   </div>
</div>
@endsection