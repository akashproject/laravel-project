<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', isset($fundRaiser->title) ? $fundRaiser->title : '') }}" >
   </div>

   <div class="col-md-12 mb-3">
      <label for="title">Value</label>
      <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="value" value="{{ old('value', isset($fundRaiser->value) ? $fundRaiser->value : '') }}" >
   </div>


   <div class="col-md-12 mb-3">
      <label for=""> Icon</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($fundRaiser->icon) ? asset('storage/fund_raisers/'.$fundRaiser->icon) : asset('backend_assets/images/default-image.png') }}"
         alt="Fund Raiser Icon"
         id="fund_raiser_icon"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $fundRaiser->icon ?? '' }}"
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
         <input type="file" name="icon" class="form-control d-none @error('icon') is-invalid @enderror" onchange="showImage(this)">
      </div>
   </div>

</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($fundRaiser) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.fund-raiser.index') }}">Cancel</a>

@push('backend-scripts')
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=icon]').click();
   });
   
   function showImage(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#fund_raiser_icon').attr('src', e.target.result);
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
