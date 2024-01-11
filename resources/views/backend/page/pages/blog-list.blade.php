{{-- Start Blog Template Listing Section --}}
<div class="accordion content_template template_blog" id="accordionBlogListing">
   <div class="card">
      <div class="card-header" id="headingBlogListing">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseBlogListing" aria-expanded="false" aria-controls="collapseBlogListing">
            Blog List Module
            </button>
         </h2>
      </div>
      <div id="collapseBlogListing" class="collapse show" aria-labelledby="headingBlogListing" data-parent="#accordionBlogListing">
         <div class="card-body">
            <div class="form-group">
               <label class="form-label">Title</label>
                  <input type="text" name="blog_list_title" value="{{ old('blog_list_title', $page_content->blog_list_title ?? '') }}" class="form-control @error('blog_list_title') is-invalid @enderror" />
            </div>

            <div class="form-group">
               <label class="form-label">SubTitle</label>
                  <input type="text" name="blog_list_subtitle" value="{{ old('blog_list_subtitle', $page_content->blog_list_subtitle ?? '') }}" class="form-control @error('blog_list_subtitle') is-invalid @enderror" />
            </div>

            <div class="form-group">
               <select class="form-control show-tick" name="blog_list_id[]" multiple="">
                  @if ($blogs->count() > 0)
                  @foreach ($blogs as $blog)
                  @if (!empty($page_content->blog_list_id) && in_array($blog->id, $page_content->blog_list_id))
                  <option value="{{ $blog->id }}" selected=""> {{ $blog->title }} </option>
                  @else
                  <option value="{{ $blog->id }}"> {{ $blog->title }} </option>
                  @endif
                  @endforeach
                  @endif
               </select>
            </div>

         </div>
      </div>
   </div>
</div>
{{-- End Blog Template List Section --}}


