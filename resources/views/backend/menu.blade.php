@extends('backend.layouts.backendMasterLayout')
@section('title','Create Menu')
@section('backendContent')
    {!! Menu::render() !!}
@endsection

@push('backend-scripts')
    {!! Menu::scripts() !!}
@endpush