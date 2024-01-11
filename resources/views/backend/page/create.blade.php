@extends('backend.layouts.backendMasterLayout') 
@section('title','Create Page') 
@section('backendContent')
<!-- Widgets -->
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Create Page</h2>
            {{-- <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a> --}}
         </div>
         <div class="card-body">
            <form action="{{ route('admin.page.store') }}" method="POST" enctype="multipart/form-data">
               {{ csrf_field() }}
               @include('backend.page.form')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection 
@push('backend-scripts')
<script>
   $(function () {
      $('.content_template').hide();
      $(".inpt-specific").hide();

      // $(`.template_home`).slideDown();
      // let dfltTmplVal = $('select[name=page_template]').val();
      // console.log(dfltTmplVal)
     
         $("#page-template").on("change", function () {
            let dataObj = $(this),
                tmplVal = dataObj.val();
            // tmplVal = 'template_about';
            console.log(tmplVal)
            $(".inpt-specific").hide();
            $(".template_inner-only").hide();
            $('.content_template').slideUp(500);
            $(`.${tmplVal}-only`).show();
            $(`.${tmplVal}`).slideDown('slow');
            $(`.${tmplVal}-hide`).hide();

            // tmplVal !='' && tmplVal=='template_default' ? $('.page-content').show() : $('.page-content').hide();  
         });
      });
   
   function showBanner(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
   
           reader.onload = function (e) {
               $("#bannerImage").attr("src", e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
       }
   }   
</script>
@endpush