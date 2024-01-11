<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', isset($blog->title) ? $blog->title : '') }}" >
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Short Description</label>
      <textarea name="short_description" class="form-control tinymce @error('short_description') is-invalid @enderror" id="short_description">{{ old('short_description', isset($blog->short_description) ? $blog->short_description : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Long Description</label>
      <textarea name="long_description" class="form-control tinymce @error('long_description') is-invalid @enderror" id="long_description">{{ old('long_description', isset($blog->long_description) ? $blog->long_description : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3">
      <label for=""> Image</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($blog->image) ? asset('storage/blogs/'.$blog->image) : asset('backend_assets/images/default-image.png') }}"
         alt="Blog Image"
         id="blog_image"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $blog->image ?? '' }}"
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


   <div class="col-md-12 mb-3">
      <label>Aurthor Name</label>
      <input type="text" name="aurthor_name" class="form-control @error('aurthor_name') is-invalid @enderror" value="{{ old('aurthor_name', isset($blog->aurthor_name) ? $blog->aurthor_name : '') }}">
   </div>

   <div class="col-md-12 mb-3">
      <label for=""> Aurthor Image</label>
      <br>
      <input type="hidden" name="rmv_exist_aurthor_image">
      <img 
         src="{{ !empty($blog->aurthor_image) ? asset('storage/blogs/'.$blog->aurthor_image) : asset('backend_assets/images/default-image.png') }}"
         alt="Aurthor Image"
         id="aurthor_image"
         data-hdninput="rmv_exist_aurthor_image"
         data-imge="{{ $blog->aurthor_image ?? '' }}"
         data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
         class="img-fluid"
         style="width: 100px;">
      <div class="pt-2">
         <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadAurthorBtn" title="Upload new image">
         <i class="fas fa-upload"></i>
         </a>
         <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove image">
         <i class="fas fa-trash-alt"></i>
         </a>
         <input type="file" name="aurthor_image" class="form-control d-none @error('aurthor_image') is-invalid @enderror" onchange="showAurthorImage(this)">
      </div>
   </div>

   <div class="col-md-6 mb-3">
      <input type="text" name="published_on" class="form-control datepicker @error('published_on') is-invalid @enderror" placeholder="Event Date" value="{{ old('published_on', isset($blog->published_on) ? date('Y-m-d', strtotime($blog->published_on)) : '') }}" >
   </div>

   <div class="col-md-6 mb-3">
      <label for="btn-label">Choose Membership Type</label>
      <select name="membership_plan_id" class="form-control chosen-select @error('membership_plan_id') is-invalid @enderror">
      @if ($membership_plans->count())
         @foreach ($membership_plans as $membership_plan)
            @if (isset($blog) && $membership_plan->id == $blog->membership_plan_id)
            <option value="{{ $membership_plan->id }}" selected>{{ $membership_plan->name }}</option>
            @else
            <option value="{{ $membership_plan->id }}">{{ $membership_plan->name }}</option>

            @endif
         @endforeach
      @endif
      </select>
   </div>
</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($blog) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.blog.index') }}">Cancel</a>

@push('backend-scripts')

<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=image]').click();
   });
   $('.uploadAurthorBtn').click(function(){
      $('input[name=aurthor_image]').click();
   });
   
   function showImage(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#blog_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
   }

   function showAurthorImage(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#aurthor_image').attr('src', e.target.result);
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