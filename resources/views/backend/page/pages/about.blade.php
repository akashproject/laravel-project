{{-- Start About Template Banner Section --}}
<div class="accordion template_home-hide template_about template_contact template_event template_program template_default template_donation template_register-hide  template_login-hide" id="accordionAboutBanner">
   <div class="card">
      <div class="card-header" id="headingAboutBanner">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseAboutBanner" aria-expanded="false" aria-controls="collapseAboutBanner">
            Banner Section
            </button>
         </h2>
      </div>
      <div id="collapseAboutBanner" class="collapse show" aria-labelledby="headingAboutBanner" data-parent="#accordionAboutBanner">
         <div class="card-body">
            <div class="form-group">
               <label class="form-label">Bread Crumb Title</label>
               <div class="form-line">
                  <input type="text" name="about_banner_bread_crumb_title" value="{{ old('about_banner_bread_crumb_title', $page_content->about_banner_bread_crumb_title ?? '') }}" class="form-control @error('about_banner_bread_crumb_title') is-invalid @enderror" />
               </div>
            </div>
            <div class="form-group">
               <label class="form-label">Sub Title</label>
               <input type="text" name="about_banner_subtitle" value="{{ old('about_banner_subtitle', $page_content->about_banner_subtitle ?? '') }}" class="form-control @error('about_banner_subtitle') is-invalid @enderror" />
            </div>
            <div class="form-group">
               <label class="form-label">Sub Heading</label>
               <textarea name="about_banner_content" class="form-control tinymce @error('about_banner_content') is-invalid @enderror" >{{ old('about_banner_content', $page_content->about_banner_content ?? '') }}</textarea>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- End About Template Banner Section --}}


{{-- Start About Template Who We Are Section --}}
<div class="accordion content_template template_about" id="accordionnAboutWhoWeAre">
   <div class="card">
      <div class="card-header" id="headingAboutWhoWeAre">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseAboutWhoWeAre" aria-expanded="false" aria-controls="collapseAboutWhoWeAre">
               Who We Are Section
            </button>
         </h2>
         </div>
         <div id="collapseAboutWhoWeAre" class="collapse show" aria-labelledby="headingAboutWhoWeAre" data-parent="#accordionAboutWhoWeAre">
            <div class="card-body">

               <div class="form-group">
                  <label class="form-label">Banner</label>
                  <div class="form-line">
                     <input type="file" name="about_who_we_banner[]" multiple="" accept="image/*" onchange="showAboutWhoWeBannerImage(this)" class="form-control @error('about_who_we_banner') is-invalid @enderror" />
                  </div>
                  
                  @if (!empty($about_who_we_bannerArr))
                     @foreach ($about_who_we_bannerArr as $item)
                        <img 
                        src="{{ !empty($item) ? asset('/'.$item) : asset('backend_assets/images/default-image.png') }}"
                        id="about_who_we_banner" style="width: 90px; margin-top: 5px;" />
                     @endforeach
                  @else
                     <img 
                        src="{{ asset('backend_assets/images/default-image.png') }}"
                        id="about_who_we_banner" style="width: 90px; margin-top: 5px;"
                      />
                  @endif
                  
               </div>
      
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="about_who_we_title" value="{{ old('about_who_we_title', $page_content->about_who_we_title ?? '') }}" class="form-control @error('about_who_we_title') is-invalid @enderror" />
               </div>
              

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="about_who_we_subtitle" value="{{ old('about_who_we_subtitle', $page_content->about_who_we_subtitle ?? '') }}" class="form-control @error('about_who_we_subtitle') is-invalid @enderror" />
               </div>
            

               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="about_who_we_content" class="form-control tinymce @error('about_who_we_content') is-invalid @enderror" >{{ old('about_who_we_content', $page_content->about_who_we_content ?? '') }}</textarea>
               </div>

               <hr>

               <div class="form-group">
                  <label for=""> About Who We Icon 1</label>
                  <br>
                  <input type="hidden" name="rmv_exist_image">
                  <img 
                     src="{{ isset($page_content->about_who_we_image_1) ? asset('/'.$page_content->about_who_we_image_1) : asset('backend_assets/images/default-image.png') }}"
                     alt="Fund Raiser Icon"
                     id="about_who_we_image_1"
                     data-hdninput="rmv_exist_image"
                     data-imge="{{ $page_content->about_who_we_image_1 ?? '' }}"
                     data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
                     class="img-fluid"
                     style="width: 100px;">
                  <div class="pt-2">
                     <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadBtnWhoWeImage_1" title="Upload new image">
                     <i class="fas fa-upload"></i>
                     </a>
                     <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove image">
                     <i class="fas fa-trash-alt"></i>
                     </a>
                     <input type="file" name="about_who_we_image_1" class="form-control d-none @error('about_who_we_image_1') is-invalid @enderror" onchange="showAboutWhoWeImage_1(this)">
                  </div>
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Title 1</label>
                  <input type="text" name="about_who_we_image_title_1" value="{{ old('about_who_we_image_title_1', $page_content->about_who_we_image_title_1 ?? '') }}" class="form-control @error('about_who_we_image_title_1') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Content 1</label>
                  <textarea name="about_who_we_image_content_1" class="form-control tinymce @error('about_who_we_image_content_1') is-invalid @enderror" >{{ old('about_who_we_image_content_1', $page_content->about_who_we_image_content_1 ?? '') }}</textarea>
               </div>

               <hr><hr>

               <div class="form-group">
                  <label for=""> Who We Icon 2</label>
                  <br>
                  <input type="hidden" name="rmv_exist_image">
                  <img 
                     src="{{ isset($page_content->about_who_we_image_2) ? asset('/'.$page_content->about_who_we_image_2) : asset('backend_assets/images/default-image.png') }}"
                     alt="Fund Raiser Icon"
                     id="about_who_we_image_2"
                     data-hdninput="rmv_exist_image"
                     data-imge="{{ $page_content->about_who_we_image_2 ?? '' }}"
                     data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
                     class="img-fluid"
                     style="width: 100px;">
                  <div class="pt-2">
                     <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadBtnWhoWeImage_2" title="Upload new image">
                     <i class="fas fa-upload"></i>
                     </a>
                     <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove image">
                     <i class="fas fa-trash-alt"></i>
                     </a>
                     <input type="file" name="about_who_we_image_2" class="form-control d-none @error('about_who_we_image_2') is-invalid @enderror" onchange="showAboutWhoWeImage_2(this)">
                  </div>
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Title 2</label>
                  <input type="text" name="about_who_we_image_title_2" value="{{ old('about_who_we_image_title_2', $page_content->about_who_we_image_title_2 ?? '') }}" class="form-control @error('about_who_we_image_title_2') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Icon Content 2</label>
                  <textarea name="about_who_we_image_content_2" class="form-control tinymce @error('about_who_we_image_content_2') is-invalid @enderror" >{{ old('about_who_we_image_content_2', $page_content->about_who_we_image_content_2 ?? '') }}</textarea>
               </div>
               
         </div>
      </div>
   </div>
</div>
{{-- End About Template Who We Are Section --}}

{{-- Start About Template Strategic Priority Section --}}
<div class="accordion content_template template_about" id="accordionAboutStrategic">
   <div class="card">
      <div class="card-header" id="headingAboutStrategic">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseAboutStrategic" aria-expanded="false" aria-controls="collapseAboutStrategic">
               Strategic Priority Section
            </button>
         </h2>
         </div>
         <div id="collapseAboutStrategic" class="collapse show" aria-labelledby="headingAboutStrategic" data-parent="#accordionAboutStrategic">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="about_strategic_title" value="{{ old('about_strategic_title', $page_content->about_strategic_title ?? '') }}" class="form-control @error('about_strategic_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Sub Title</label>
                  <input type="text" name="about_strategic_subtitle" value="{{ old('about_strategic_subtitle', $page_content->about_strategic_subtitle ?? '') }}" class="form-control @error('about_strategic_subtitle') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Strategic Priority List</label>
                  <select class="form-control chosen-select" name="strategic_priority_id[]" multiple>
                     @if ($strategic_priorities->count() > 0)
                     @foreach ($strategic_priorities as $strategic_priority)
                     @if (isset($page_content->strategic_priority_id) && in_array($strategic_priority->id, $page_content->strategic_priority_id))
                        <option value="{{ $strategic_priority->id }}" selected="">{{ $strategic_priority->title }}</option>
                     @else
                        <option value="{{ $strategic_priority->id }}">{{ $strategic_priority->title }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End About Template Strategic Priority Section --}}


{{-- Start About Template Fund Raiser --}}
<div class="accordion content_template template_about" id="accordionAboutFundRaiser">
   <div class="card">
      <div class="card-header" id="headingAboutFundRaiser">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseAboutFundRaiser" aria-expanded="false" aria-controls="collapseAboutFundRaiser">
               Fund Raiser Section
            </button>
         </h2>
         </div>
         <div id="collapseAboutFundRaiser" class="collapse show" aria-labelledby="headingAboutFundRaiser" data-parent="#accordionAboutFundRaiser">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="about_fund_raiser_title" value="{{ old('about_fund_raiser_title', $page_content->about_fund_raiser_title ?? '') }}" class="form-control @error('about_fund_raiser_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">SubTitle</label>
                  <input type="text" name="about_fund_raiser_subtitle" value="{{ old('about_fund_raiser_subtitle', $page_content->about_fund_raiser_subtitle ?? '') }}" class="form-control @error('about_fund_raiser_subtitle') is-invalid @enderror" />
               </div>
               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="about_fund_raiser_content" class="form-control tinymce @error('about_fund_raiser_content') is-invalid @enderror" >{{ old('about_fund_raiser_content', $page_content->about_fund_raiser_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Choose Fund Raiser List</label>
                  <select class="form-control chosen-select" name="fund_raiser_id[]" multiple>
                     @if ($fund_raisers->count() > 0)
                     @foreach ($fund_raisers as $fund_raiser)
                     @if (isset($page_content->fund_raiser_id) && in_array($fund_raiser->id, $page_content->fund_raiser_id))
                        <option value="{{ $fund_raiser->id }}" selected="">{{ $fund_raiser->title }}</option>
                     @else
                        <option value="{{ $fund_raiser->id }}">{{ $fund_raiser->title }}</option>
                     @endif
                     @endforeach
                     @endif
                  </select>
               </div>
         </div>
      </div>
   </div>
</div>
{{-- End About Template Fund Raiser --}}

@push('backend-scripts')
<script>

   $('.uploadBtnWhoWeImage_1').click(function(){
      $('input[name=about_who_we_image_1]').click();
   });
   $('.uploadBtnWhoWeImage_2').click(function(){
      $('input[name=about_who_we_image_2]').click();
   });
   function showAboutWhoWeBannerImage(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
   
           reader.onload = function (e) {
               $("#about_who_we_banner").attr("src", e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
       }
   }  

   function showAboutWhoWeImage_1(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
   
           reader.onload = function (e) {
               $("#about_who_we_image_1").attr("src", e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
       }
   } 

   function showAboutWhoWeImage_2(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
   
           reader.onload = function (e) {
               $("#about_who_we_image_2").attr("src", e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
       }
   } 
    
</script>
@endpush



