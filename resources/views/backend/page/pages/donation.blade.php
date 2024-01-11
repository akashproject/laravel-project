{{-- Start About Template Who We Are Section --}}
<div class="accordion content_template template_donation" id="accordionDonation">
   <div class="card">
      <div class="card-header" id="headingDonation">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseDonation" aria-expanded="false" aria-controls="collapseDonation">
               Donation Contenet Section
            </button>
         </h2>
         </div>
         <div id="collapseDonation" class="collapse show" aria-labelledby="headingDonation" data-parent="#accordionDonation">
            <div class="card-body">
      
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="donation_who_we_title" value="{{ old('donation_who_we_title', $page_content->donation_who_we_title ?? '') }}" class="form-control @error('donation_who_we_title') is-invalid @enderror" />
               </div>
              

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="donation_who_we_subtitle" value="{{ old('donation_who_we_subtitle', $page_content->donation_who_we_subtitle ?? '') }}" class="form-control @error('donation_who_we_subtitle') is-invalid @enderror" />
               </div>
            

               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="donation_who_we_content" class="form-control tinymce @error('donation_who_we_content') is-invalid @enderror" >{{ old('donation_who_we_content', $page_content->donation_who_we_content ?? '') }}</textarea>
               </div>

               <hr>

               <div class="form-group">
                  <label for=""> Donation Who We Icon 1</label>
                  <br>
                  <input type="hidden" name="rmv_exist_image">
                  <img 
                     src="{{ !empty($page_content->donation_who_we_image_1) ? asset('/'.$page_content->donation_who_we_image_1) : asset('backend_assets/images/default-image.png') }}"
                     alt="Fund Raiser Icon"
                     id="donation_who_we_image_1"
                     data-hdninput="rmv_exist_image"
                     data-imge="{{ $page_content->donation_who_we_image_1 ?? '' }}"
                     data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
                     class="img-fluid"
                     style="width: 100px;">
                  <div class="pt-2">
                     <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadDonationBtnImage1" title="Upload new image">
                     <i class="fas fa-upload"></i>
                     </a>
                     <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove image">
                     <i class="fas fa-trash-alt"></i>
                     </a>
                     <input type="file" name="donation_who_we_image_1" class="form-control d-none @error('donation_who_we_image_1') is-invalid @enderror" onchange="showDonationWhoWeImage_1(this)">
                  </div>
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Title 1</label>
                  <input type="text" name="donation_who_we_image_title_1" value="{{ old('donation_who_we_image_title_1', $page_content->donation_who_we_image_title_1 ?? '') }}" class="form-control @error('donation_who_we_image_title_1') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Content 1</label>
                  <textarea name="donation_who_we_image_content_1" class="form-control tinymce @error('donation_who_we_image_content_1') is-invalid @enderror" >{{ old('donation_who_we_image_content_1', $page_content->donation_who_we_image_content_1 ?? '') }}</textarea>
               </div>

               <hr><hr>

               <div class="form-group">
                  <label for=""> Who We Icon 2</label>
                  <br>
                  <input type="hidden" name="rmv_exist_image">
                  <img 
                     src="{{ !empty($page_content->donation_who_we_image_2) ? asset('/'.$page_content->donation_who_we_image_2) : asset('backend_assets/images/default-image.png') }}"
                     alt="Fund Raiser Icon"
                     id="donation_who_we_image_2"
                     data-hdninput="rmv_exist_image"
                     data-imge="{{ $page_content->donation_who_we_image_2 ?? '' }}"
                     data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
                     class="img-fluid"
                     style="width: 100px;">
                  <div class="pt-2">
                     <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadDonationBtnImage2" title="Upload new image">
                     <i class="fas fa-upload"></i>
                     </a>
                     <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove image">
                     <i class="fas fa-trash-alt"></i>
                     </a>
                     <input type="file" name="donation_who_we_image_2" class="form-control d-none @error('donation_who_we_image_2') is-invalid @enderror" onchange="showDonationWhoWeImage_2(this)">
                  </div>
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Title 2</label>
                  <input type="text" name="donation_who_we_image_title_2" value="{{ old('donation_who_we_image_title_2', $page_content->donation_who_we_image_title_2 ?? '') }}" class="form-control @error('donation_who_we_image_title_2') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Content 2</label>
                  <textarea name="donation_who_we_image_content_2" class="form-control tinymce @error('donation_who_we_image_content_2') is-invalid @enderror" >{{ old('donation_who_we_image_content_2', $page_content->donation_who_we_image_content_2 ?? '') }}</textarea>
               </div>
               
         </div>
      </div>
   </div>
</div>
{{-- End About Template Who We Are Section --}}

@push('backend-scripts')
<script>

   $('.uploadDonationBtnImage1').click(function(){
      $('input[name=donation_who_we_image_1]').click();
   });
   $('.uploadDonationBtnImage2').click(function(){
      $('input[name=donation_who_we_image_2]').click();
   });

   function showDonationWhoWeImage_1(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function (e) {
               $("#donation_who_we_image_1").attr("src", e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
       }
   } 

   function showDonationWhoWeImage_2(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function (e) {
               $("#donation_who_we_image_2").attr("src", e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
       }
   } 
    
</script>
@endpush



