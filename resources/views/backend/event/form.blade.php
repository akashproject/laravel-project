<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" id="title" value="{{ old('title', isset($event->title) ? $event->title : '') }}" >
   </div>

   <div class="col-md-6 mb-3">
      <label for="btn-label">From Time</label>
      <input type="text" name="from_date" class="form-control timepicker @error('from_date') is-invalid @enderror" placeholder="From Time" value="{{ old('from_date', isset($event->from_date) ? date('h:i a',strtotime($event->from_date)) : '') }}" >
   </div>

   <div class="col-md-6 mb-3">
      <label for="btn-label-link">To Time</label>
      <input type="text" name="to_date" class="form-control timepicker @error('to_date') is-invalid @enderror" placeholder="To Time" id="to_date" value="{{ old('to_date', isset($event->to_date) ? $event->to_date : '') }}" >
   </div>

   <div class="col-md-6 mb-3">
      <label for="btn-label-link">Event Date</label>
      <input type="text" name="event_date" class="form-control datepicker @error('event_date') is-invalid @enderror" placeholder="Event Date" value="{{ old('event_date', isset($event->event_date) ? date('Y-m-d', strtotime($event->event_date)) : '') }}" >
   </div>

   <div class="col-md-6 mb-3">
      <label>Location</label>
      <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Enter Location" value="{{ old('location', isset($event->location) ? $event->location : '') }}">
   </div>

   <div class="col-md-6 mb-3">
      <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3">
         <input type="checkbox" name="is_guest" class="custom-control-input" id="customCheck2" {{ isset($event) && $event->is_guest == 1 ? 'checked' : '' }}>
         <label class="custom-control-label" for="customCheck2">Guest Allowed Payment Mode</label>
      </div>
   </div>

   <div class="col-md-6 mb-3">
      <label>Global Payment Type</label>
      <select class="form-control @error('global_payment_type') is-invalid @enderror" name="event_type" id="event_type">
         {{-- <option value="" selected>Select Payment Type</option> --}}
         <option value="Free Event" {{ (isset($event)) && $event->event_type == 'Free Event' ? 'selected' :'' }}>Free Event</option>
         <option value="Paid Event" {{ (isset($event)) && $event->event_type == 'Paid Event' ? 'selected' :'' }}>Paid Event</option>
         <option value="Paid Event" {{ (isset($event)) && $event->event_type == 'Not Allowed' ? 'selected' :'' }}>Not Allowed</option>
      </select>
   </div>

   <div class="col-md-6 mb-3" id="event_price">
      <label>Event Price</label>
      <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', isset($event->price) ? $event->price : '') }}">
   </div>

   <div class="row container">

      @foreach ($member_ships as $member_ship)
       <div class="col-md-5 mb-3">
           <label>Membership Type</label>
           <input type="text" class="form-control" disabled value="{{ $member_ship->name }}">
           <input type="hidden" name="membership_plan_id[]" value="{{ $member_ship->id }}">
       </div>
       <div class="col-md-5 mb-3">
         <label>Choose Payment Type</label>
         @if (isset($event))
              @php
                  $membership = $event->memberships->find($member_ship->id);
                  $paymentType = $membership ? $membership->pivot->member_payment_type : null;
              @endphp
              <select class="form-control event__type" name="member_payment_type[]" required>
                  <option value="Free Event" {{ $paymentType == "Free Event" ? 'selected' : '' }}>Free Event</option>
                  <option value="Paid Event" {{ $paymentType == "Paid Event" ? 'selected' : '' }}>Paid Event</option>
                  <option value="Not Allowed" {{$paymentType == "Not Allowed" ? 'selected' : '' }}>Not Allowed</option>
              </select>
         @else
            <select class="form-control event__type" name="member_payment_type[]" required>
               <option value="Free Event">Free Event</option>
               <option value="Paid Event">Paid Event</option>
               <option value="Not Allowed">Not Allowed</option>
            </select>
         @endif
       </div>
      @endforeach

   </div>

   <div class="col-md-6 mb-3">
      <label>Number of Seat</label>
      <input type="number" name="num_of_seat" class="form-control @error('num_of_seat') is-invalid @enderror" value="{{ old('num_of_seat', isset($event->num_of_seat) ? $event->num_of_seat : '') }}">
   </div>

   <div class="col-md-6 mb-3">
      <label>Organizer Name</label>
      <input type="text" name="organizer_name" class="form-control @error('organizer_name') is-invalid @enderror" value="{{ old('organizer_name', isset($event->organizer_name) ? $event->organizer_name : '') }}">
   </div>
   

   <div class="col-md-12 mb-3">
      <label for="sub-title">Short Description</label>
      <textarea name="short_description" class="form-control tinymce @error('short_description') is-invalid @enderror" id="short_description">{{ old('short_description', isset($event->short_description) ? $event->short_description : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3">
      <label for="sub-title">Long Description</label>
      <textarea name="long_description" class="form-control tinymce @error('long_description') is-invalid @enderror" id="long_description">{{ old('long_description', isset($event->long_description) ? $event->long_description : '') }}</textarea>
   </div>

   <div class="col-md-12 mb-3">
      <label for=""> Image</label>
      <br>
      <input type="hidden" name="rmv_exist_image">
      <img 
         src="{{ !empty($event->image) ? asset('storage/events/'.$event->image) : asset('backend_assets/images/default-image.png') }}"
         alt="Event Image"
         id="event_image"
         data-hdninput="rmv_exist_image"
         data-imge="{{ $event->image ?? '' }}"
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
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($event) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.event.index') }}">Cancel</a>


@push('backend-scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> --}}
<script type="text/javascript">
   $('.uploadBtn').click(function(){
      $('input[name=image]').click();
   });
   
   function showImage(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
   
         reader.onload = function(e) {
            $('#event_image').attr('src', e.target.result);
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
      $('#event_price').hide();
      @if (isset($event->event_type) && $event->event_type == "Paid Event")
          $('#event_price').show();
      @endif
      $('#event_type').on('change',function(){
         let curObj = $(this),
             eventType = curObj.val();
             // eventType !='' ? ($('.event_price').show()) : ($('.event_price').hide())
             eventType != '' && eventType == 'Paid Event' ? $('#event_price').show() : $('#event_price').hide();            
      })
   });

   
</script>
@endpush