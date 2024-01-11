@extends('backend.layouts.backendMasterLayout')
@section('title','Edit Page')
@section('backendContent')
<div class="row">
   <div class="col-12">
      <div class="card card-default">
         <div class="card-header align-items-center">
            <h2 class="">Edit Page</h2>
            {{-- <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-pill">Add Plan</a> --}}
         </div>
         <div class="card-body">
            <form action="{{ route('admin.page.update', $page) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               @include('backend.page.form')
               @method('PUT')
            </form>
         </div>
      </div>
   </div>
</div>
@endsection 

@push('backend-scripts')
<script>
   $(function() {
      let rmvExistImageIds = [];
   
      $('.content_template').hide();
      $(".inpt-specific").hide();
   
      // $('.template_resource').show();
      $('.{{ $page->page_template }}').slideDown();
      $(`.{{ $page->page_template }}-only`).show();

      let templateVal = `{{ $page->page_template }}`;
      console.log(templateVal)

      $(`.${templateVal}-hide`).hide();

      $("#page-template").on("change", function() {
         let dataObj = $(this),
            tmplVal = dataObj.val();
   
         $(".inpt-specific").hide();
         $('.content_template').slideUp('1000');
         $(`.${tmplVal}-only`).show();
         $(`.${tmplVal}`).slideDown('slow');
         $(`.${tmplVal}-hide`).hide();

            // tmplVal !='' && tmplVal=='template_default' ? $('.page-content').show() : $('.page-content').hide();

      });

      $('.btn-remove-image').on('click',function(){
         // alert(0)
         let curElm = $(this),
            domImg = curElm.prev(),
            imgPath = domImg?.data('img'),
            hdnInput = domImg?.data('hdninput');
           

         !!curElm.data('id') && (
            rmvExistImageIds.push(curElm.data('id')),
            $('input[name="rmv_exist_image_ids"]').val(rmvExistImageIds.join())
         );

         domImg.hide() && curElm.hide()

         imgPath!='' && (
            $(`input[name=${hdnInput}]`).val(1)
            // domImg.attr('src', defaultImgPath)
         )
       })


   });
   
   /*function showBanner(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $(".bannerImage").attr("src", e.target.result);
         };
         reader.readAsDataURL(input.files[0]);
      }
   }*/
</script>
@endpush