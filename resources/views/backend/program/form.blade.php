<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', isset($program->title) ? $program->title : '') }}" >
   </div>

   <div class="col-md-6 mb-3">
      <label for="btn-label">From Date</label>
      <input type="text" name="from_date" class="form-control timepicker @error('from_date') is-invalid @enderror" id="from_date" value="{{ old('from_date', isset($program->from_date) ? date('h:i a',strtotime($program->from_date)) : '') }}" >
      @error('from_date')
      <span class="text-danger">
         {{ $message }}
      </span>
      @enderror
      
   </div>

   <div class="col-md-6 mb-3">
      <label for="btn-label-link">To Date</label>
      <input type="text" name="to_date" class="form-control timepicker @error('to_date') is-invalid @enderror" id="to_date" value="{{ old('to_date', isset($program->to_date) ? date('h:i a',strtotime($program->to_date)) : '') }}" >
      @error('to_date')
      <span class="text-danger">
         {{ $message }}
      </span>
      @enderror
   </div>

   <div class="col-md-6 mb-3">
      <label for="btn-label-link">Program Date</label>
      <input type="text" name="program_date" class="form-control datepicker @error('program_date') is-invalid @enderror" id="program_date" value="{{ old('program_date', isset($program->program_date) ? date('Y-m-d',strtotime($program->program_date)) : '') }}" >

      @error('program_date')
      <span class="text-danger">
         {{ $message }}
      </span>
      @enderror
   </div>

   <div class="col-md-6 mb-3">
      <label>Location</label>
      <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', isset($program->location) ? $program->location : '') }}">
   </div>

   <div class="col-md-6 mb-3">
      <label>Global Payment Type</label>
      <select class="form-control @error('global_payment_type') is-invalid @enderror" name="program_type" id="program_type">
         <option value="" selected>Select Payment Type</option>
         <option value="Free Program" {{ (isset($program)) && $program->program_type == 'Free Program' ? 'selected' :'' }}>Free Program</option>
         <option value="Paid Program" {{ (isset($program)) && $program->program_type == 'Paid Program' ? 'selected' :'' }}>Paid Program</option>
      </select>
   </div>

   <div class="col-md-6 mb-3" id="program_price">
      <label>Program Price</label>
      <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', isset($program->price) ? $program->price : '') }}">
   </div>

   <div class="row container">

      {{-- @foreach ($member_ships as $member_ship)
      <div class="col-md-5 mb-3">
         <label >Membership Title</label>
         <input type="text" class="form-control" disabled value="{{ $member_ship->name }}">
         <input type="hidden" name="membership_plan_id[]" value="{{ $member_ship->id }}">
      </div>

      <div class="col-md-5 mb-3">
         <label>Choose Payment Type</label>
         <select class="form-control program__type" name="member_payment_type[]" required>
            <option value="Free Program">Free Program</option>
            <option value="Paid Program">Paid Program</option>
            <option value="Not Allowed">Not Allowed</option>
         </select>
      </div>
      @endforeach --}}

      
      {{-- @foreach ($member_ships as $member_ship)
       <div class="col-md-5 mb-3">
           <label>Membership Title</label>
           <input type="text" class="form-control" disabled value="{{ $member_ship->name }}">
           <input type="hidden" name="membership_plan_id[]" value="{{ $member_ship->id }}">
       </div>

       <div class="col-md-5 mb-3">
           <label>Choose Payment Type for Events</label>
           <select class="form-control event__type" name="event_member_payment_type[]" required>
               <option value="Free Event" {{ $program->memberships->find($member_ship->id)->pivot->member_payment_type == "Free Event" ? 'selected' : '' }}>Free Event</option>
               <option value="Paid Event" {{ $program->memberships->find($member_ship->id)->pivot->member_payment_type == "Paid Event" ? 'selected' : '' }}>Paid Event</option>
               <option value="Not Allowed" {{ $program->memberships->find($member_ship->id)->pivot->member_payment_type == "Not Allowed" ? 'selected' : '' }}>Not Allowed</option>
           </select>
       </div>
      @endforeach --}}

      {{-- @foreach ($member_ships as $member_ship)
       <div class="col-md-5 mb-3">
           <label>Membership Title</label>
           <input type="text" class="form-control" disabled value="{{ $member_ship->name }}">
           <input type="hidden" name="membership_plan_id[]" value="{{ $member_ship->id }}">
       </div>
       <div class="col-md-5 mb-3">
           <label>Choose Payment Type for Events</label>
           @php
               $membership = $program->memberships->find($member_ship->id);
               $paymentType = $membership ? $membership->pivot->member_payment_type : null;
           @endphp
           <select class="form-control event__type" name="member_payment_type[]" required>
               <option value="Free Program" {{ $program->memberships->find($member_ship->id)->pivot->member_payment_type == "Free Program" ? 'selected' : '' }}>Free Program</option>
               <option value="Paid Program" {{ $program->memberships->find($member_ship->id)->pivot->member_payment_type == "Paid Program" ? 'selected' : '' }}>Paid Program</option>
               <option value="Not Allowed" {{ $program->memberships->find($member_ship->id)->pivot->member_payment_type == "Not Allowed" ? 'selected' : '' }}>Not Allowed</option>
           </select>
       </div>
      @endforeach --}}

      @foreach ($member_ships as $member_ship)
       <div class="col-md-5 mb-3">
           <label>Membership Title</label>
           <input type="text" class="form-control" disabled value="{{ $member_ship->name }}">
           <input type="hidden" name="membership_plan_id[]" value="{{ $member_ship->id }}">
       </div>

       <div class="col-md-5 mb-3">
           <label>Choose Payment Type</label>
           @if (isset($program))
              @php
                  $membership = $program->memberships->find($member_ship->id);
                  $paymentType = $membership ? $membership->pivot->member_payment_type : null;
              @endphp
              <select class="form-control event__type" name="member_payment_type[]" required>
                  <option value="Free Program" {{ $paymentType == "Free Program" ? 'selected' : '' }}>Free Program</option>
                  <option value="Paid Program" {{ $paymentType == "Paid Program" ? 'selected' : '' }}>Paid Program</option>
                  <option value="Not Allowed" {{ $paymentType == "Not Allowed" ? 'selected' : '' }}>Not Allowed</option>
              </select>
             @else
             <select class="form-control event__type" name="member_payment_type[]" required>
                  <option value="Free Program" >Free Program</option>
                  <option value="Paid Program">Paid Program</option>
                  <option value="Not Allowed">Not Allowed</option>
              </select>
           @endif
       </div>
      @endforeach


      
      
   </div>


   <div class="col-md-6 mb-3">
      <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3">
         <input type="checkbox" name="is_guest" class="custom-control-input" id="customCheck2" {{ isset($program) && $program->is_guest == 1 ? 'checked' : '' }}>
         <label class="custom-control-label" for="customCheck2">Is Guest</label>
      </div>
   </div>

   <div class="col-md-6 mb-3">
      <label>Number of Seat</label>
      <input type="number" name="num_of_seat" class="form-control @error('num_of_seat') is-invalid @enderror" value="{{ old('num_of_seat', isset($program->num_of_seat) ? $program->num_of_seat : '') }}">
   </div>

   <div class="col-md-6 mb-3">
      <label>Organizer Name</label>
      <input type="text" name="organizer_name" class="form-control @error('organizer_name') is-invalid @enderror" value="{{ old('organizer_name', isset($program->organizer_name) ? $program->organizer_name : '') }}">
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Short Description</label>
      <textarea name="short_description" class="form-control tinymce @error('short_description') is-invalid @enderror" id="short_description">{{ old('short_description', isset($program->short_description) ? $program->short_description : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Long Description</label>
      <textarea name="long_description" class="form-control tinymce @error('long_description') is-invalid @enderror" id="long_description">{{ old('long_description', isset($program->long_description) ? $program->long_description : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3">
      <label for=""> Image</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($program->image) ? asset('storage/programs/'.$program->image) : asset('backend_assets/images/default-image.png') }}"
         alt="Program Image"
         id="program_image"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $program->image ?? '' }}"
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
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($program) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.program.index') }}">Cancel</a>

@push('backend-scripts')
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=image]').click();
   });
   
   function showImage(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#program_image').attr('src', e.target.result);
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
      $('#program_price').hide()
      @if (isset($program) && $program->program_type == 'Paid Program')
            $('#program_price').show()
      @endif
      $('#program_type').on('change',function(){
         let curObj = $(this),
             programType = curObj.val();
             // programType !='' ? ($('.program_price').show()) : ($('.program_price').hide())
             programType != '' && programType == 'Paid Program' ? $('#program_price').show() : $('#program_price').hide();
      })
   });
</script>
@endpush