{{-- Start Program Template Listing Section --}}
<div class="accordion content_template template_program template_blog" id="accordionProgramListing">
   <div class="card">
      <div class="card-header" id="headingProgramListing">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseProgramListing" aria-expanded="false" aria-controls="collapseProgramListing">
            Program List Module
            </button>
         </h2>
      </div>
      <div id="collapseProgramListing" class="collapse show" aria-labelledby="headingProgramListing" data-parent="#accordionProgramListing">
         <div class="card-body">
            <div class="form-group">
               <label class="form-label">Title</label>
                  <input type="text" name="program_list_title" value="{{ old('program_list_title', $page_content->program_list_title ?? '') }}" class="form-control @error('program_list_title') is-invalid @enderror" />
            </div>

            <div class="form-group">
               <label class="form-label">SubTitle</label>
                  <input type="text" name="program_list_subtitle" value="{{ old('program_list_subtitle', $page_content->program_list_subtitle ?? '') }}" class="form-control @error('program_list_subtitle') is-invalid @enderror" />
            </div>

            {{-- <div class="form-group">
               <label class="form-label">Choose Program List</label>
               <select class="form-control chosen-select" name="program_list_id[]" multiple="">
                  @if ($programs->count() > 0)
                  @foreach ($programs as $program)
                  @if (!empty($page_content->program_list_id) && in_array($program->id, $page_content->program_list_id))
                  <option value="{{ $program->id }}" selected=""> {{ $program->title }} </option>
                  @else
                  <option value="{{ $program->id }}"> {{ $program->title }} </option>
                  @endif
                  @endforeach
                  @endif
               </select>
            </div> --}}

         </div>
      </div>
   </div>
</div>
{{-- End Program Template List Section --}}
