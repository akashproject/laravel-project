<div class="row">
   <div class="col-md-8">
      <div class="accordion" id="accordionPageModule">
         <div class="card">
            <div class="card-header" id="headingPageModule">
               <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePageModule"
                     aria-expanded="true" aria-controls="collapsePageModule">
                  Page Module
                  </button>
               </h2>
            </div>
            <div id="collapsePageModule" class="collapse show" aria-labelledby="headingPageModule"
               data-parent="#accordionPageModule">
               <div class="card-body">
                  <div class="form-group">
                     <div class="form-line">
                        <label class="form-label">Page Title</label>
                        <input type="text" name="title" value="{{ old('title', $page->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" />
                     </div>
                  </div>
                  {{-- <div class="form-group">
                     <div class="form-line">
                        <label class="form-label">Page Sub Title</label>
                        <input type="text" name="sub_title" value="{{ old('sub_title', $page_content->sub_title ?? '') }}" class="form-control @error('sub_title') is-invalid @enderror" />
                     </div>
                  </div> --}}
                  <div class="form-group content_template template_home-hide template_default">
                     <label class="form-label">Page Content</label>
                     <div class="form-line">
                        <textarea name="page_content" cols="30" rows="6" class="form-control tinymce @error('page_content') is-invalid @enderror">{!! old('page_content', $page_content->page_content ?? '') !!}</textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{-- Start Home Template --}}
      @include('backend.page.pages.home')
      @include('backend.page.pages.about')
      @include('backend.page.pages.contact-us')
      @include('backend.page.pages.event-list')
      @include('backend.page.pages.program-list')
      @include('backend.page.pages.blog-list')
      @include('backend.page.pages.resource')
      @include('backend.page.pages.donation')
      @include('backend.page.pages.leadership_registration')

      {{-- End Home Template --}}
   </div>
   <div class="col-md-4">
      <div class="accordion" id="accordionPageDetails">
         <div class="card">
            <div class="card-header" id="headingPageDetails">
               <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse"
                     data-target="#collapsePageDetails" aria-expanded="false" aria-controls="collapsePageDetails">
                  Page Details
                  </button>
               </h2>
            </div>
            <div id="collapsePageDetails" class="collapse show" aria-labelledby="headingPageDetails" data-parent="#accordionPageDetails">
               <div class="card-body">
                  <div class="form-group">
                     <label class="form-label">Page Template</label>
                     <select class="form-control show-tick" name="page_template" id="page-template">
                     <option value="template_default" {{ isset($page->page_template) ? $page->page_template == 'template_default' ? 'selected':'disabled' : '' }}> Template Default </option>
                     <option value="template_home" {{ isset($page->page_template) ? $page->page_template == 'template_home' ? 'selected':'disabled' :''}}> Template Home </option>
                     <option value="template_about" {{ isset($page->page_template) ? $page->page_template == 'template_about' ? 'selected':'disabled' :''}}> Template About </option>
                     <option value="template_contact" {{ isset($page->page_template) ? $page->page_template == 'template_contact' ? 'selected':'disabled' :'' }}> Template Contact </option>
                     <option value="template_event" {{ isset($page->page_template) ? $page->page_template == 'template_event' ? 'selected':'disabled' :'' }}> Template Event </option>
                     <option value="template_program" {{ isset($page->page_template) ? $page->page_template == 'template_program' ? 'selected':'disabled' :'' }}> Template Program </option>
                     <option value="template_blog" {{ isset($page->page_template) ? $page->page_template == 'template_blog' ? 'selected':'disabled' :'' }}> Template Blog </option>
                     <option value="template_resource" {{ isset($page->page_template) ? $page->page_template == 'template_resource' ? 'selected':'disabled' :'' }}> Template Resourcess </option>
                     <option value="template_donation" {{ isset($page->page_template) ? $page->page_template == 'template_donation' ? 'selected':'disabled' :'' }}> Template Donation </option>

                     <option value="template_register" {{ isset($page->page_template) ? $page->page_template == 'template_register' ? 'selected':'disabled' :'' }}> Registration </option>

                     <option value="template_login" {{ isset($page->page_template) ? $page->page_template == 'template_login' ? 'selected':'disabled' :'' }}> Template Login </option>
                     <option value="template_thankyou" {{ isset($page->page_template) ? $page->page_template == 'template_thankyou' ? 'selected':'disabled' :'' }}> Template Thank You </option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="accordion" id="accordionPageBanner">
            <div class="card">
               <div class="card-header" id="headingPageBanner">
                  <h2 class="mb-0">
                     <button class="btn btn-link" type="button" data-toggle="collapse"
                        data-target="#collapsePageBanner" aria-expanded="false" aria-controls="collapsePageBanner">
                     Page Banner
                     </button>
                  </h2>
               </div>
               <div id="collapsePageBanner" class="collapse show" aria-labelledby="headingPageBanner" data-parent="#accordionPageBanner">
                  <div class="card-body">
                     <div class="form-group">
                        
                        {{-- <label class="form-label">Banner</label>
                        <div class="form-line">
                           <input type="file" name="banner_image[]" multiple="" accept="image/*" onchange="showBanner(this)" class="form-control @error('banner_image') is-invalid @enderror" />
                        </div>
                        <img src="{{ asset('backend_assets/img/default-image.png') }}" id="bannerImage" alt="banner_image" style="width: 90px; margin-top: 5px;" /> --}}
                        <input type="hidden" name="rmv_exist_image">

                        <img 
                           src="{{ !empty($page->banner) ? asset('storage/pages/'.$page->banner) : asset('backend_assets/images/default-image.png') }}"
                           alt="{{ $page->banner ?? ''}}"
                           id="banner"
                           data-hdninput="rmv_exist_image"
                           data-imge="{{ $page->banner ?? '' }}"
                           data-default-image="{{ asset('backend_assets/images/default-image.png') }}"
                           class="img-fluid default-img"
                           style="width: 100px;">

                        <div class="pt-2">
                           <a href="javascript:void(0)" class="btn btn-primary btn-sm uploadBtn" title="Upload new profile image">
                              <i class="fas fa-upload"></i>
                           </a>
                           <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-remove" title="Remove my profile image">
                              <i class="fas fa-trash-alt"></i>
                           </a>
                           <input type="file" name="banner" class="form-control d-none" onchange="showBannerImage(this)">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="accordion" id="accordionSeoContent">
            <div class="card">
               <div class="card-header" id="headingSeoContent">
                  <h2 class="mb-0">
                     <button class="btn btn-link" type="button" data-toggle="collapse"
                        data-target="#collapseSeoContent" aria-expanded="false" aria-controls="collapseSeoContent">
                     Seo Content
                     </button>
                  </h2>
               </div>
               <div id="collapseSeoContent" class="collapse show" aria-labelledby="headingSeoContent" data-parent="#accordionSeoContent">
                  <div class="card-body">
                     <div class="form-group">
                        <div class="form-line">
                           <label class="form-label">Meta Title</label>
                           <input type="text" name="meta_key" value="{{ old('meta_key',$page->meta_key ?? '') }}" class="form-control @error('meta_key') is-invalid @enderror" />
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-line">
                           <label class="form-label">Meta Description</label>
                           <textarea name="meta_content" cols="30" rows="6" name="meta_content" class="form-control">{{ old('meta_content',$page->meta_content ?? '') }}</textarea>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($page) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.page.index') }}">Cancel</a>


@push('backend-scripts')
   <script type="text/javascript">
      $('.uploadBtn').on('click',function(){
         $('input[name=banner]').click();
      });

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

      function showBannerImage(input){
         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e){
               $('#banner').attr('src',e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>
@endpush