<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Page Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', isset($widget->name) ? $widget->name : '') }}" >
   </div>
   <div class="col-md-12 mb-3">
      <label for="sub-title">Bread Cumb Title</label>
      <input type="text" name="bread_crumb_title" class="form-control @error('bread_crumb_title') is-invalid @enderror" id="sub-title" value="{{ old('bread_crumb_title', isset($widget->bread_crumb_title) ? $widget->bread_crumb_title : '') }}">
   </div>
   <div class="col-md-12 mb-3">
      <label for="btn-label">Bread Cumb SubTitle</label>
      <input type="text" name="bread_crumb_subtitle" class="form-control @error('bread_crumb_subtitle') is-invalid @enderror" id="btn-label" value="{{ old('bread_crumb_subtitle', isset($widget->bread_crumb_subtitle) ? $widget->bread_crumb_subtitle : '') }}" >
   </div>
   <div class="col-md-12 mb-3">
      <label class="form-label">Page Content</label>
      <textarea name="bread_crumb_content" cols="30" rows="6" class="form-control tinymce @error('bread_crumb_content') is-invalid @enderror">{!! old('bread_crumb_content', $widget->bread_crumb_content ?? '') !!}</textarea>
   </div>


   {{-- <div class="col-md-12 mb-3">
      <label for=""> Banner</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($widget->banner) ? asset('storage/widgets/'.$widget->banner) : asset('backend_assets/images/default-image.png') }}"
         alt="Home Banner"
         id="widget_banner"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $widget->banner ?? '' }}"
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
   </div> --}}
</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($widget) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.widget.index') }}">Cancel</a>
@push('backend-scripts')
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=banner]').click();
   });
   
   function showBanner(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $('#widget_banner').attr('src', e.target.result);
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