<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', isset($strategicPriority->title) ? $strategicPriority->title : '') }}" >
   </div>
   <div class="col-md-12 mb-3">
      <label for="title">Sub Title 1</label>
      <input type="text" name="sub_title_1" class="form-control @error('sub_title_1') is-invalid @enderror"
       id="sub_title_1" value="{{ old('sub_title_1', isset($content->sub_title_1) ? $content->sub_title_1 : '') }}" >
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Content 1</label>
      <textarea name="content_1" class="form-control tinymce @error('content_1') is-invalid @enderror"
       id="content_1">{{ old('content_1', isset($content->content_1) ? $content->content_1 : '') }}</textarea>
   </div>

   <hr>

   <div class="col-md-12 mb-3">
      <label for="title">Sub Title 2</label>
      <input type="text" name="sub_title_2" class="form-control @error('sub_title_2') is-invalid @enderror"
       id="sub_title_2" value="{{ old('sub_title_2', isset($content->sub_title_2) ? $content->sub_title_2 : '') }}" >
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Content 2</label>
      <textarea name="content_2" class="form-control tinymce @error('content_2') is-invalid @enderror"
       id="content_2">{{ old('content_2', isset($content->content_2) ? $content->content_2 : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3">
      <label for=""> Image</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($strategicPriority->image) ? asset('storage/strategic_priorities/'.$strategicPriority->image) : asset('backend_assets/images/default-image.png') }}"
         alt="Blog Image"
         id="stratigic_priority_image"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $strategicPriority->image ?? '' }}"
         data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
         class="img-fluid"
         style="width: 100px;">
      <div class="pt-2">
         <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadBtn" title="Upload new image">
         <i class="fas fa-upload"></i>
         </a>
         <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove image">
         <i class="fas fa-trash-alt"></i>
         </a>
         <input type="file" name="image" class="form-control d-none @error('image') is-invalid @enderror" onchange="showImage(this)">
      </div>
   </div>

</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($strategicPriority) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.strategic-priority.index') }}">Cancel</a>

@push('backend-scripts')
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=image]').click();
   });
   
   function showImage(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#stratigic_priority_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
   }
   
   $('.btn-remove').on('click',function(){
   let curElm = $(this),
       domImg = curElm.parent().parent().find('img'),
       imgPath = domImg.length && domImg.attr('src'),
       defaultImgPath = domImg.length && domImg.data('default-image'),
       hdnInput = domImg.length && domImg.data('hdninput');
       imgPath !='' && (
         $(`input[name=${hdnInput}]`).val(1),
          domImg.attr('src', defaultImgPath)
     )
   })
</script>
@endpush
