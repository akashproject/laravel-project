@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Faq')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Faq</h2>
            {{-- <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a> --}}
         </div>
         <div class="card-body">
            <form action="{{ route('admin.faq.update', $faq) }}" method="POST">
                {{ csrf_field() }}
               @include('backend.faq.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection