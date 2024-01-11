{{-- Start About Template Who We Are Section --}}
<div class="accordion content_template template_register template_login template_thankyou" id="accordionDonation">
   <div class="card">
      <div class="card-header" id="headingLeadershipRegistration">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseLeadershipRegistration" aria-expanded="false" aria-controls="collapseLeadershipRegistration">
               Registration Contenet Section
            </button>
         </h2>
         </div>
         <div id="collapseLeadershipRegistration" class="collapse show" aria-labelledby="headingLeadershipRegistration" data-parent="#accordionLeadershipRegistration">
            <div class="card-body">
      
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="registration_title" value="{{ old('registration_title', $page_content->registration_title ?? '') }}" class="form-control @error('registration_title') is-invalid @enderror" />
               </div>
            
               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="registration_content" class="form-control tinymce @error('registration_content') is-invalid @enderror" >{{ old('registration_content', $page_content->registration_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label for="form-label">Image</label>
                  <br>
                  <input type="hidden" name="rmv_exist_image">
                  <img 
                     src="{{ !empty($page_content->registration_image) ? asset('/'.$page_content->registration_image) : asset('backend_assets/images/default-image.png') }}"
                     alt="Fund Raiser Icon"
                     id="registration_image"
                     data-hdninput="rmv_exist_image"
                     data-imge="{{ $page_content->registration_image ?? '' }}"
                     data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
                     class="img-fluid"
                     style="width: 100px;">
                  <div class="pt-2">
                     <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadRegintrationBtnImage1" title="Upload new image">
                     <i class="fas fa-upload"></i>
                     </a>
                     <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove image">
                     <i class="fas fa-trash-alt"></i>
                     </a>
                     <input type="file" name="registration_image" class="form-control d-none @error('registration_image') is-invalid @enderror" onchange="showDonationWhoWeImage_1(this)">
                  </div>
               </div>

               <div class="form-group">
                  <label class="form-label">Image Content</label>
                  <textarea name="registration_image_content" class="form-control tinymce @error('registration_image_content') is-invalid @enderror" >{{ old('registration_image_content', $page_content->registration_image_content ?? '') }}</textarea>
               </div>

               
               
         </div>
      </div>
   </div>
</div>
{{-- End About Template Who We Are Section --}}

@push('backend-scripts')
<script>

   $('.uploadRegintrationBtnImage1').click(function(){
      $('input[name=registration_image]').click();
   });

   function showDonationWhoWeImage_1(input) {
      if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function (e) {
               $("#registration_image").attr("src", e.target.result);
         };
        reader.readAsDataURL(input.files[0]);
      }
   } 
</script>
@endpush



