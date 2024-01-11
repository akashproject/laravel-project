@extends('backend.layouts.backendMasterLayout')
@section('title','Create Faq')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Faq</h2>
            {{-- <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a> --}}
         </div>
         <div class="card-body">
            <form action="{{ route('admin.faq.store') }}" method="POST">
                {{ csrf_field() }}
               @include('backend.faq.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection