<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', isset($banner->title) ? $banner->title : '') }}" >
   </div>
   <div class="col-md-12 mb-3">
      <label for="sub-title">Sub Title</label>
      <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" id="sub-title" value="{{ old('sub_title', isset($banner->sub_title) ? $banner->sub_title : '') }}">
   </div>
   <div class="col-md-12 mb-3">
      <label for="btn-label">Button Label</label>
      <input type="text" name="banner_btn_label" class="form-control @error('banner_btn_label') is-invalid @enderror" id="btn-label" value="{{ old('banner_btn_label', isset($banner->banner_btn_label) ? $banner->banner_btn_label : '') }}" >
   </div>
   <div class="col-md-12 mb-3">
      <label for="btn-label-link">Button Label Url</label>
      <input type="text" name="banner_btn_link" class="form-control @error('banner_btn_link') is-invalid @enderror" id="btn-label-link" value="{{ old('banner_btn_link', isset($banner->banner_btn_link) ? $banner->banner_btn_link : '') }}" >
   </div>
   <div class="col-md-12 mb-3">
      <label for=""> Banner</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($banner->banner) ? asset('storage/banners/'.$banner->banner) : asset('backend_assets/images/default-image.png') }}"
         alt="Home Banner"
         id="home_banner"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $banner->banner ?? '' }}"
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
         <input type="file" name="banner" class="form-control d-none @error('banner') is-invalid @enderror" onchange="showBanner(this)">
      </div>
   </div>
</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($banner) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.banner.index') }}">Cancel</a>
@push('backend-scripts')
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=banner]').click();
   });
   
   function showBanner(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#home_banner').attr('src', e.target.result);
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