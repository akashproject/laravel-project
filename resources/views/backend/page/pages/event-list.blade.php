{{-- Start Event Template Listing Section --}}
<div class="accordion content_template template_event template_blog" id="accordionEventListing">
   <div class="card">
      <div class="card-header" id="headingEventListing">
         <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEventListing" aria-expanded="false" aria-controls="collapseEventListing">
            Event List Module
            </button>
         </h2>
      </div>
      <div id="collapseEventListing" class="collapse show" aria-labelledby="headingEventListing" data-parent="#accordionEventListing">
         <div class="card-body">
            <div class="form-group">
               <label class="form-label">Title</label>
                  <input type="text" name="event_list_title" value="{{ old('event_list_title', $page_content->event_list_title ?? '') }}" class="form-control @error('event_list_title') is-invalid @enderror" />
            </div>

            <div class="form-group">
               <label class="form-label">SubTitle</label>
                  <input type="text" name="event_list_subtitle" value="{{ old('event_list_subtitle', $page_content->event_list_subtitle ?? '') }}" class="form-control @error('event_list_subtitle') is-invalid @enderror" />
            </div>

            {{-- <div class="form-group">
               <label class="form-label">Choose Event List</label>
               <select class="form-control chosen-select" name="event_list_id[]" multiple="">
                  @if ($events->count() > 0)
                  @foreach ($events as $event)
                  @if (!empty($page_content->event_list_id) && in_array($event->id, $page_content->event_list_id))
                  <option value="{{ $event->id }}" selected=""> {{ $event->title }} </option>
                  @else
                  <option value="{{ $event->id }}"> {{ $event->title }} </option>
                  @endif
                  @endforeach
                  @endif
               </select>
            </div> --}}

         </div>
      </div>
   </div>
</div>
{{-- End Event Template List Section --}}
