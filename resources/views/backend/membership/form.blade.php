<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', isset($membership->name) ? $membership->name : '') }}" >
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Description</label>
      <textarea name="description" class="form-control tinymce @error('description') is-invalid @enderror" id="description">{{ old('description', isset($membership->description) ? $membership->description : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3"> <label for="sub-title">Choose Member</label>
      <select class="form-control" name="parent_id">
         <option value="" selected>Select Member</option>
         @if ($member_ships->count())
            @foreach ($member_ships as $member_ship)
               @if ((isset($membership)) && $member_ship->id == $membership->parent_id)
               <option value="{{ $member_ship->id }}" selected>{{ $member_ship->name }}</option>
               @else
                 <option value="{{ $member_ship->id }}">{{ $member_ship->name }}</option>   
               @endif
            @endforeach 
         @endif 
      </select>
   </div>

   <div class="col-md-12 mb-3">
      <label for=""> Image</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($membership->image) ? asset('storage/memberships/'.$membership->image) : asset('backend_assets/images/default-image.png') }}"
         alt="Event Image"
         id="membership_image"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $membership->image ?? '' }}"
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
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($membership) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.membership.index') }}">Cancel</a>
@push('backend-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>


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

    $(document).ready(function () {
      /*$('#datetimepicker1').datetimepicker({
         format: 'DD-MM-YYYY LT'
      });
      $('#datetimepicker2').datetimepicker({
         format: 'DD-MM-YYYY'
      });
      $('#datetimepicker3').datetimepicker({
         format: 'LT'
      });
      $('#datetimepicker3').datetimepicker({
         format: 'LT'
      });
      */
      $('#from_time').datetimepicker({
         format: 'LT'
      });

      $('#to_time').datetimepicker({
         format: 'LT'
      });
   });
</script>
@endpush