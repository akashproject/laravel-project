<div class="form-row">
                  

  <div class="col-md-12 mb-3">
     <label for="name">Name</label>
     <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', isset($membershipPlan->name) ? $membershipPlan->name : '') }}" placeholder="Name" >
     
  </div>

  <div class="col-md-12 mb-3">
     <label for="price">Price</label>
     <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="" value="{{ old('price', isset($membershipPlan->price) ? $membershipPlan->price : '') }}">
  </div>

  <div class="col-md-12 mb-3">
     <label for="description">Description</label>
        <textarea name="description" class="form-control tinymce @error('description') is-invalid @enderror" id="description">{{ old('description', isset($membershipPlan->description) ? $membershipPlan->description : '') }}</textarea>
  </div>
  

  <div class="col-md-12 mb-3">
     <label for="tenure">Choose Tenure</label>
     <select class="form-control chosen-select @error('tenure') is-invalid @enderror" name="tenure">
        {{-- @if (empty($membershipPlan)) --}}
            <option value="" selected>Select Tenure</option>
        {{-- @endif --}}

        @if (isset($membershipPlan->tenure) && $membershipPlan->tenure == 'Month')
            <option value="Month" selected>Month</option>
            <option value="Day">Day</option>
            <option value="week">Week</option>

        @elseif (isset($membershipPlan->tenure) && $membershipPlan->tenure == 'Day')
            <option value="Month">Month</option>
            <option value="Day" selected>Day</option>
            <option value="week">Week</option>

        @elseif (isset($membershipPlan->tenure) && $membershipPlan->tenure == 'week')
            <option value="Month">Month</option>
            <option value="Day">Day</option>
            <option value="week" selected>Week</option>
        @else
            <option value="Month">Month</option>
            <option value="Day">Day</option>
            <option value="week">Week</option>
        @endif

     </select>
  </div>
  

  <div class="col-md-12 mb-3">
     <label for="features">Features</label>
     <textarea name="features" class="form-control tinymce @error('features') is-invalid @enderror">{{ old('features', isset($membershipPlan->features) ? $membershipPlan->features : '') }}</textarea>
  </div>

  <div class="col-md-12 mb-3 card">

      <div id="member_content_box" class="row card-body">
         @if (isset($member_child_content->member_child_title) && is_array($member_child_content->member_child_title))
            @php
               $counter = 0;
            @endphp
            @foreach ($member_child_content->member_child_title as $key=>$element)
            @php
               $counter++;
            @endphp
            <div class="col-md-5 mb-4 member_content_box_{{ $counter }} border border-success mt-5">
               <div class="form-group">
                  <label for="title"> Member Child Name </label>
                  <input type="text" name="member_child_title[]" class="form-control" value="{{ $member_child_content->member_child_title[$key] ?? '' }}">
               </div>

               <div class="form-group">
                  <label for="sub-title"> Member Child Content </label>
                  <textarea name="member_child_content[]" class="form-control tinymce ">{{ $member_child_content->member_child_title[$key] ?? '' }}</textarea>
               </div>

               <div class="form-group">
                  <label for="membership_image"> Member Child Image </label>
                  <input type="file" name="member_child_image[]" class="form-control">

                  <img src="{{!empty($member_child_content->member_child_image[$key]) ? asset('storage/membership_plans/'.$member_child_content->member_child_image[$key]) : asset('backend_assets/images/default-image.png') }}" class="blog_image" style="width: 40px; margin-top: 10px;">
               </div>
            </div>
            <div class="col-md-1 member_content_box_1">
               <div class="form-group text-center">
                  <div class="form-group">
                     @if ($counter == 1)
                        <button type="button" class="btn btn-primary mt-5" onclick="membership_add_more()"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
                     @else
                        <button type="button" class="btn btn-danger mt-5" onclick="membership_remove_more({{ $counter }})"> <i class="fa-solid fa-minus"></i> </button>
                     @endif
                  </div>
               </div>
            </div>
            @endforeach
            @else
            <div class="col-md-5 member_content_box_1 border">
               <div class="form-group">
                  <label for="title"> Member Child Name </label>
                  <input type="text" name="member_child_title[]" class="form-control" value="">
               </div>

               <div class="form-group">
                  <label for="sub-title"> Member Child Content </label>
                  <textarea name="member_child_content[]" class="form-control tinymce"></textarea>
               </div>

               <div class="form-group">
                  <label for="membership_image"> Member Child Image </label>
                  <input type="file" name="member_child_image[]" class="form-control">
               </div>
            </div>
            <div class="col-md-1 member_content_box_1">
               <div class="form-group text-center">
                  <button class="btn btn-success" type="button" onclick="membership_add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
               </div>
            </div>
            @endif
 

      </div>
   </div>


</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($membershipPlan) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.membership-plans.index') }}">Cancel</a>

@push('backend-scripts')
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=image]').click();
   });
   
   function showImage(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#membership_image').attr('src', e.target.result);
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

   // let loop_count = 1;
   let loop_count =`{{ isset($member_child_content->member_child_title) ? count($member_child_content->member_child_title) : 1 }} `;
   console.log(`Before loop count`, loop_count)
   function membership_add_more(){
      loop_count++;
   console.log(`After loop count`, loop_count)

      // alert(loop_count)
      let template = `
            <div class="col-md-5 member_content_box_${loop_count} border border-success mt-5">
               <div class="form-group">
                  <label for="title"> Member Child Name </label>
                  <input type="text" name="member_child_title[]" class="form-control" value="">
               </div>

               <div class="form-group">
                  <label for="sub-title"> Member Child Content </label>
                  <textarea name="member_child_content[]" class="form-control tinymce "></textarea>
               </div>

               <div class="form-group">
                  <label for="membership_image"> Member Child Image </label>
                  <input type="file" name="member_child_image[]" class="form-control">
               </div>
            </div>
            <div class="col-md-1 member_content_box_${loop_count}">
               <div class="form-group text-center">
                  <button class="btn btn-danger" type="button" onclick="membership_remove_more(${loop_count})"><i class="fa fa-minus" aria-hidden="true"></i></button>
               </div>
            </div>`;

      $("#member_content_box").append(template);
   }

   function membership_remove_more(loop_count){
      // console.log(`loop count: `loop_count)
      $(`.member_content_box_${loop_count}`).remove();
   }
</script>
@endpush