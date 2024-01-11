
<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', isset($strategicPriority->title) ? $strategicPriority->title : '') }}" >
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

   <div class="col-md-12 mb-3 ">

      <div id="content_box">
         @if (isset($strategic_content->subtitle) && is_array($strategic_content->subtitle))
         @php
            $counter = 0;
         @endphp
         @foreach ($strategic_content->subtitle as $key=>$element)
         @php
            $counter++;
         @endphp
            <div class="row" id="content_box_{{ $counter }}">
               <div class="col-md-10">
                  <div class="form-group">
                     <label for="title">SubTitle </label>
                     <input type="text" name="subtitle[]" class="form-control" value="{{ $strategic_content->subtitle[$key] ?? '' }}">
                     {{-- {{ old('subtitle', isset($strategicPriority->subtitle) ? $strategicPriority->subtitle : '') }} --}}
                  </div>

                  <div class="form-group">
                     <label for="sub-title">Content </label>
                     <textarea name="content[]" class="form-control tinymce ">{{ $strategic_content->content[$key] ?? '' }}</textarea>
                     {{-- {{ old('content', isset($strategicPriority->content) ? $strategicPriority->content : '') }} --}}
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="form-group">
                     @if ($counter == 1)
                        <button type="button" class="btn btn-primary mt-5" onclick="add_more()"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
                     @else
                        <button type="button" class="btn btn-danger mt-5" onclick="remove_more({{ $counter }})"> <i class="fa-solid fa-minus"></i> </button>
                     @endif
                  </div>
               </div>
            </div>
         @endforeach
         @else
         <div class="row" id="content_box_1">
            <div class="col-md-10">
               <div class="form-group">
                  <label for="title">SubTitle </label>
                  <input type="text" name="subtitle[]" class="form-control" value="">
                  {{-- {{ old('subtitle', isset($strategicPriority->subtitle) ? $strategicPriority->subtitle : '') }} --}}
               </div>

               <div class="form-group">
                  <label for="sub-title">Content </label>
                  <textarea name="content[]" class="form-control tinymce "></textarea>
                  {{-- {{ old('content', isset($strategicPriority->content) ? $strategicPriority->content : '') }} --}}
               </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  <button type="button" class="btn btn-primary mt-5" onclick="add_more()"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
               </div>
            </div>
         </div>
         @endif


      </div>

      <div class="sub_title_content"></div>
   </div>

   <hr>
   
</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($strategicPriority) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.strategic-priority.index') }}">Cancel</a>

@push('backend-scripts')
<script type="text/javascript">
   let loop_count =`{{ isset($strategic_content->subtitle) ? count($strategic_content->subtitle) : 1 }} `;
   console.log(`before: `,loop_count)
   function add_more(){
      loop_count++;
   console.log(`after: `,loop_count)


      let template = `<div class="row" id="content_box_${loop_count}">
                        <div class="col-md-10">
                           <div class="form-group">
                              <label for="title">SubTitle </label>
                              <input type="text" name="subtitle[]" class="form-control"  value="">
                           </div>
                           <div class="form-group">
                              <label for="sub-title">Content </label>
                              <textarea name="content[]" class="form-control tinymce "></textarea>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <button type="button" class="btn btn-danger mt-5" onclick="remove_more(${loop_count})"> <i class="fa-solid fa-minus"></i> </button>
                           </div>
                        </div>
                     </div>`;

      $("#content_box").append(template);
   }

   function remove_more(loop_count){
      $(`#content_box_${loop_count}`).remove();
   }


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
