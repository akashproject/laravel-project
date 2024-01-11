<div class="form-row">
   <div class="form-group col-md-7">
      <label class="form-label">Name</label>
      <input type="text" name="name" value="{{ old('name', $team->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" />
   </div>
   <div class="col-md-12 mb-3">
      <label for=""> Banner</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($team->image) ? asset('storage/teams/'.$team->image) : asset('backend_assets/images/default-image.png') }}"
         alt="Home Banner"
         id="home_team"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $team->image ?? '' }}"
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
         <input type="file" name="image" class="form-control d-none @error('image') is-invalid @enderror" onchange="showBanner(this)">
      </div>
   </div>
</div>
<button class="btn btn-primary btn-pill mr-2 mt-4" type="submit">{{ isset($team) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.team.index') }}">Cancel</a>
@push('backend-scripts')
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=image]').click();
   });
   
   function showBanner(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#home_team').attr('src', e.target.result);
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