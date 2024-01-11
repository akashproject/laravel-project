{{-- Start About Template Banner Section --}}

{{-- End About Template Banner Section --}}


{{-- Start Contact Template Information Section --}}
<div class="accordion content_template template_contact" id="accordionContactInformation">
   <div class="card">
      <div class="card-header" id="headingContactInformation">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
               data-target="#collapseContactInformation" aria-expanded="false" aria-controls="collapseContactInformation">
               Contact Us Information Section
            </button>
         </h2>
         </div>
         <div id="collapseContactInformation" class="collapse show" aria-labelledby="headingContactInformation" data-parent="#accordionContactInformation">
            <div class="card-body">
               <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" name="contact_title" value="{{ old('contact_title', $page_content->contact_title ?? '') }}" class="form-control @error('contact_title') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">SubTitle</label>
                  <input type="text" name="contact_subtitle" value="{{ old('contact_subtitle', $page_content->contact_subtitle ?? '') }}" class="form-control @error('contact_subtitle') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Content</label>
                  <textarea name="contact_content" class="form-control tinymce @error('contact_content') is-invalid @enderror" >{{ old('contact_content', $page_content->contact_content ?? '') }}</textarea>
               </div>

               <div class="form-group">
                  <label class="form-label">Mobile Number</label>
                  <input type="text" name="contact_mobile_no" value="{{ old('contact_mobile_no', $page_content->contact_mobile_no ?? '') }}" class="form-control @error('contact_mobile_no') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="text" name="contact_email" value="{{ old('contact_email', $page_content->contact_email ?? '') }}" class="form-control @error('contact_email') is-invalid @enderror" />
               </div>

               <div class="form-group">
                  <label class="form-label">Register Title</label>
                  <input type="text" name="register_title" value="{{ old('register_title', $page_content->register_title ?? '') }}" class="form-control @error('register_title') is-invalid @enderror" />
               </div>

         </div>
      </div>
   </div>
</div>
{{-- End Contact Template Information Section --}}




