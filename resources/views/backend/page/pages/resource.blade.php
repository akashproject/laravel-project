{{-- Start Resource Template Video Section --}}
<div class="accordion content_template template_resource" id="accordionResource">
   <div class="card">
      <div class="card-header" id="headingResource">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseResource" aria-expanded="false" aria-controls="collapseResource">
            Resource List Video Module
            </button>
         </h2>
      </div>
      <div id="collapseResource" class="collapse show" aria-labelledby="headingResource" data-parent="#accordionResource">
         <div class="card-body">
            <div class="form-group">
               <label class="form-label">Head Title</label>
                  <input type="text" name="resource_head_title" value="{{ old('resource_head_title', $page_content->resource_head_title ?? '') }}" class="form-control @error('resource_head_title') is-invalid @enderror" />
            </div>

            <div class="form-group">
               <label class="form-label">Head SubTitle</label>
                  <input type="text" name="resource_head_subtitle" value="{{ old('resource_head_subtitle', $page_content->resource_head_subtitle ?? '') }}" class="form-control @error('resource_head_subtitle') is-invalid @enderror" />
            </div>

            <div class="" id="video_content_box">
               @if (!empty($resource_video_titleArr))    
               @php
                  $counter = 0;             
               @endphp           
               @foreach ($resource_video_titleArr as $key=>$element)
               @php
                  $counter++;       
               @endphp
              
               <div class="row border border-success" id="video_content_box_{{ $counter }}">
                  <div class="col-md-12">
                     <div class="form-group text-center">
                        @if ($counter == 1)
                           <button class="btn btn-success" type="button" onclick="add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        @else
                           <button class="btn btn-danger" type="button" onclick="remove_more({{ $counter }})"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        @endif
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Video Title</label>
                     <input type="text" name="resource_video_title[]" value="{{ $element }}" class="form-control "/>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Video Image</label>
                     <input type="file" name="resource_video_image[]" value="" alt="{{ $page_content->resource_video_image[$key] ?? '' }}" class="form-control" onchange="showImage(this)"/>
                     {{-- {{ old('resource_video_image', $page_content->resource_video_image ?? '') }} --}}
                     {{-- @php
                        $imgPath = !empty($page_content->resource_video_image[$key]) ? str_replace('public', 'storage', $page_content->resource_video_image[$key]) : '';
                     @endphp --}}
                     <img src="{{ !empty($page_content->resource_video_image[$key]) ? asset('storage/pages/'.$page_content->resource_video_image[$key]) : asset('backend_assets/images/default-image.png') }}" class="blog_image" style="width: 40px; margin-top: 10px;">
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Video</label>
                     <input type="file" name="resource_video[]" value="" class="form-control"/>
                  </div>
               </div>
               @endforeach
               @else

               <div class="row border border-success" id="video_content_box_1">
                  <div class="col-md-12">
                     <div class="form-group text-center">
                        <button class="btn btn-success" type="button" onclick="add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Video Title</label>
                     <input type="text" name="resource_video_title[]" value="" class="form-control " />
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Video Image</label>
                     <input type="file" name="resource_video_image[]" value="" class="form-control " />
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Video</label>
                     <input type="file" name="resource_video[]" value="" class="form-control " />
                  </div>
               </div>
               @endif
            </div>

         </div>
      </div>
   </div>
</div>
{{-- End Resource Template Video Section --}}


{{-- Start Resource Template Policy Section --}}
<div class="accordion content_template template_resource" id="accordionPolicy">
   <div class="card">
      <div class="card-header" id="headingPolicy">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePolicy" aria-expanded="false" aria-controls="collapsePolicy">
            Policy List Module
            </button>
         </h2>
      </div>
      <div id="collapsePolicy" class="collapse show" aria-labelledby="headingPolicy" data-parent="#accordionPolicy">
         <div class="card-body">
            <div class="form-group">
                  <label class="form-label">Head Title</label>
                  <input type="text" name="resource_policy_head_title" value="{{ old('resource_policy_head_title', $page_content->resource_policy_head_title ?? '') }}" class="form-control @error('resource_policy_head_title') is-invalid @enderror" />
            </div>

            <div class="form-group">
                  <label class="form-label">Head SubTitle</label>
                  <input type="text" name="resource_policy_head_subtitle" value="{{ old('resource_policy_head_subtitle', $page_content->resource_policy_head_subtitle ?? '') }}" class="form-control @error('resource_policy_head_subtitle') is-invalid @enderror" />
            </div>

            <div class="" id="policy_content_box">
               @if (!empty($resource_policy_titleArr))    
               @php
                  $counter = 0;             
               @endphp           
               @foreach ($resource_policy_titleArr as $key=>$element)
               @php
                  $counter++;       
               @endphp
              
               <div class="row border border-success" id="policy_content_box_{{ $counter }}">
                  <div class="col-md-12">
                     <div class="form-group text-center">
                        @if ($counter == 1)
                           <button class="btn btn-success" type="button" onclick="policy_add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        @else
                           <button class="btn btn-danger" type="button" onclick="policy_remove_more({{ $counter }})"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        @endif
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Policy Title</label>
                     <input type="text" name="resource_policy_doc_title[]" value="{{ $element }}" class="form-control " />
                     {{-- {{ old('resource_video_title', $page_content->resource_video_title ?? '') }} --}}
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Policy Document Icon</label>
                     <input type="file" name="resource_policy_doc_icon[]" value="" alt="{{ $page_content->resource_policy_doc_title[$key] ?? '' }}" class="form-control" onchange="showImage(this)"/>
                     {{-- {{ old('resource_video_image', $page_content->resource_video_image ?? '') }} --}}
                     {{-- @php
                        $imgPath = !empty($page_content->resource_policy_doc[$key]) ? str_replace('public', 'storage', $page_content->resource_policy_doc[$key]) : '';
                     @endphp --}}
                     <img src="{{  !empty($page_content->resource_policy_doc[$key]) ? asset('storage/pages/'.$page_content->resource_policy_doc[$key]) : asset('backend_assets/images/default-image.png') }}" class="blog_image" style="width: 40px; margin-top: 10px;">
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Policy Document</label>
                     <input type="file" name="policy_doc[]" value="" class="form-control " />
                     {{-- {{ old('resource_video', $page_content->resource_video ?? '') }} --}}
                  </div>
               </div>
               @endforeach
               @else

               <div class="row border border-success" id="policy_content_box_1">
                  <div class="col-md-12">
                     <div class="form-group text-center">
                        <button class="btn btn-success" type="button" onclick="policy_add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Policy Title</label>
                     <input type="text" name="resource_policy_doc_title[]" value="" class="form-control" />
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Policy Document Icon</label>
                     <input type="file" name="resource_policy_doc_icon[]" value="" class="form-control" />
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Policy Document</label>
                     <input type="file" name="resource_policy_doc[]" value="" class="form-control" />
                  </div>
               </div>
               @endif
            </div>

         </div>
      </div>
   </div>
</div>
{{-- End Resource Template Policy Section --}}

{{-- Start Resource Template Useful Document Section --}}
<div class="accordion content_template template_resource" id="accordionUsefulDocument">
   <div class="card">
      <div class="card-header" id="headingUsefulDocument">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseUsefulDocument" aria-expanded="false" aria-controls="collapseUsefulDocument">
            Useful Document List Module
            </button>
         </h2>
      </div>
      <div id="collapseUsefulDocument" class="collapse show" aria-labelledby="headingUsefulDocument" data-parent="#accordionUsefulDocument">
         <div class="card-body">
            <div class="form-group">
               <label class="form-label">Head Title</label>
                  <input type="text" name="resource_document_head_title" value="{{ old('resource_document_head_title', $page_content->resource_document_head_title ?? '') }}" class="form-control @error('resource_document_head_title') is-invalid @enderror" />
            </div>

            <div class="form-group">
               <label class="form-label">Head SubTitle</label>
                  <input type="text" name="resource_document_head_subtitle" value="{{ old('resource_document_head_subtitle', $page_content->resource_document_head_subtitle ?? '') }}" class="form-control @error('resource_document_head_subtitle') is-invalid @enderror" />
            </div>

            <div class="" id="document_content_box">

               <div class="row border border-success" id="document_content_box_1">
                  <div class="col-md-12">
                     <div class="form-group text-center">
                        <button class="btn btn-success" type="button" onclick="document_add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Title</label>
                     <input type="text" name="resource_document_doc_title[]" value="" class="form-control" />
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Icon</label>
                     <input type="file" name="resource_document_doc_icon[]" value="" class="form-control" />
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Document</label>
                     <input type="file" name="resource_document_doc[]" value="" class="form-control" />
                  </div>
               </div>
               
            </div>

         </div>
      </div>
   </div>
</div>
{{-- End Resource Template Useful Document Section --}}

{{-- Start Resource Template Visual Story Section --}}
<div class="accordion content_template template_resource" id="accordionVisualStory">
   <div class="card">
      <div class="card-header" id="headingVisualStory">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseVisualStory" aria-expanded="false" aria-controls="collapseVisualStory">
            Visual Story List Module
            </button>
         </h2>
      </div>
      <div id="collapseVisualStory" class="collapse show" aria-labelledby="headingVisualStory" data-parent="#accordionVisualStory">
         <div class="card-body">
            <div class="form-group">
               <label class="form-label">Head Title</label>
                  <input type="text" name="resource_story_head_title" value="{{ old('resource_story_head_title', $page_content->resource_story_head_title ?? '') }}" class="form-control @error('resource_story_head_title') is-invalid @enderror" />
            </div>

            <div class="form-group">
               <label class="form-label">Head SubTitle</label>
                  <input type="text" name="resource_story_head_subtitle" value="{{ old('resource_story_head_subtitle', $page_content->resource_story_head_subtitle ?? '') }}" class="form-control @error('resource_story_head_subtitle') is-invalid @enderror" />
            </div>

            <div class="row" id="story_content_box">

               @if (isset($page_content) && isset($page_content->resource_story_image[0]))
                  @php
                     $count = 0;
                  @endphp
                  @foreach ($page_content->resource_story_image as $story_image)
                  @php
                     $count++;
                  @endphp
                     <div class="col-md-4 story_content_box_{{ $count }}">
                     @php
                        // $imgPath = !empty($story_image) ? str_replace('public', 'storage', $story_image) : '';
                     @endphp
                        <img src="{{  !empty($story_image) ? asset('storage/pages/'.$story_image) : asset('backend_assets/images/default-image.png') }}" class="blog_image" style="width: 40px; margin-top: 10px;">

                        <label class="form-label">Image</label>
                        <input type="file" name="resource_story_image[]" value="" class="form-control" />
                     </div>

                     <div class="col-md-2 story_content_box_{{ $count }}">
                        <div class="form-group text-center">
                           @if ($count == 1)
                              <button class="btn btn-success" type="button" onclick="visual_story_add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                           @else
                              <button class="btn btn-danger" type="button" onclick="visual_story_remove_more({{ $count }})"><i class="fa fa-minus" aria-hidden="true"></i></button>
                           @endif
                           
                        </div>
                     </div>

                  @endforeach

               @else
                     <div class="col-md-4 visual_story_content_box_1">
                        <label class="form-label">Image</label>
                        <input type="file" name="resource_story_image[]" value="" class="form-control" />
                     </div>

                     <div class="col-md-2 visual_story_content_box_1">
                        <div class="form-group text-center">
                           <button class="btn btn-success" type="button" onclick="visual_story_add_more()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                     </div>
               @endif
                  
   
                  
            </div>


         </div>
      </div>
   </div>
</div>
{{-- End Resource Template Visual Story Section --}}


@push('backend-scripts')
   <script type="text/javascript">
      let loop_count = `{{ !empty($resource_video_titleArr) ? count($resource_video_titleArr) : 1 }}`;

      console.log(`before loop count_${loop_count}`)
      function add_more(){
         loop_count++;
         console.log(`after loop count_${loop_count}`)
         let html=`<div class="row border border-success" id="video_content_box_${loop_count}">
                     <div class="col-md-12">
                        <div class="form-group text-center">
                           <button class="btn btn-danger mt-2" type="button" onclick="remove_more(${loop_count})">
                              <i class="fa fa-minus" aria-hidden="true"></i>
                           </button>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Video Title</label>
                        <input type="text" name="resource_video_title[]" value="" class="form-control"/>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Video Image</label>
                        <input type="file" name="resource_video_image[]" value="" class="form-control"/>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Video</label>
                        <input type="file" name="resource_video[]" value="" class="form-control"/>
                     </div>
               </div>`;
         $("#video_content_box").append(html);
      }
      function remove_more(loop_count){
         $(`#video_content_box_${loop_count}`).remove();
      }
   </script>

   <script type="text/javascript">
      let policy_loop_count = `{{ !empty($resource_policy_titleArr) ? count($resource_policy_titleArr) : 1 }}`;
      function policy_add_more(){
         policy_loop_count++;
         let html=`<div class="row border border-success" id="policy_content_box_${policy_loop_count}">
                     <div class="col-md-12">
                        <div class="form-group text-center">
                           <button class="btn btn-danger mt-2" type="button" onclick="policy_remove_more(${policy_loop_count})">
                              <i class="fa fa-minus" aria-hidden="true"></i>
                           </button>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Policy Title</label>
                        <input type="text" name="resource_policy_doc_title[]" value="" class="form-control"/>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Policy Document Icon</label>
                        <input type="file" name="resource_policy_doc_icon[]" value="" class="form-control"/>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Document (PDF)</label>
                        <input type="file" name="resource_policy_doc[]" value="" class="form-control"/>
                     </div>
               </div>`;
         $("#policy_content_box").append(html);
      }
      function policy_remove_more(policy_loop_count){
         $(`#policy_content_box_${policy_loop_count}`).remove();
      }
   </script>

   <script type="text/javascript">
      let document_loop_count = 1;
      function document_add_more(){
         document_loop_count++;

         let html=`<div class="row border border-success" id="document_content_box_${document_loop_count}">
                     <div class="col-md-12">
                        <div class="form-group text-center">
                           <button class="btn btn-danger mt-2" type="button" onclick="document_remove_more(${document_loop_count})">
                              <i class="fa fa-minus" aria-hidden="true"></i>
                           </button>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label"> Title</label>
                        <input type="text" name="resource_document_doc_title[]" value="" class="form-control"/>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label"> Icon</label>
                        <input type="file" name="resource_document_doc_icon[]" value="" class="form-control"/>
                     </div>
                     <div class="col-md-4">
                        <label class="form-label">Document (PDF)</label>
                        <input type="file" name="resource_document_doc[]" value="" class="form-control"/>
                     </div>
               </div>`;
         $("#document_content_box").append(html);
      }
      function document_remove_more(document_loop_count){
         $(`#document_content_box_${document_loop_count}`).remove();
      }
   </script>


   <script type="text/javascript">
      let story_loop_count = `{{ isset($page_content) && isset($page_content->resource_story_image[0]) ? count($page_content->resource_story_image) : 1 }}`;
      // console.log(`Before story loop count ${story_loop_count}`)
      function visual_story_add_more(){
         story_loop_count++;
      // console.log(`After story loop count ${story_loop_count}`)

         let html =`<div class="col-md-4 story_content_box_${story_loop_count}">
                     <label class="form-label">Image</label>
                     <input type="file" name="resource_story_image[]" value="" class="form-control"/>
                  </div>

                  <div class="col-md-2 story_content_box_${story_loop_count}">
                     <div class="form-group text-center">
                        <button class="btn btn-danger" type="button" onclick="visual_story_remove_more(${story_loop_count})">
                           <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                     </div>
                  </div>`;
         $("#story_content_box").append(html);
      }
      function visual_story_remove_more(story_loop_count){
         $(`.story_content_box_${story_loop_count}`).remove();
      }
   </script>


@endpush
