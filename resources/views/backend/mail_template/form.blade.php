
<div class="form-group">
  <label for="TemplateName">Mail Name<span class="text-danger"> *</span></label>
    <input type="text" 
           name="name" 
           class="form-control @error('name') is-invalid @enderror"
           id="TemplateName" 
           placeholder="Template Name" 
           value="{{old('name', isset($mailTemplate->name) ? $mailTemplate->name : '')}}" 
           required />
</div>


<div class="form-group">
  <label for="TemplateSubject">Mail Subject<span class="text-danger"> *</span></label>
    <input type="text" 
           name="subject" 
           class="form-control @error('subject') is-invalid @enderror" 
           placeholder="Template Subject"
           id="TemplateSubject" 
           value="{{old('subject', isset($mailTemplate->subject) ? $mailTemplate->subject : '')}}" 
           required />
</div>

<div class="form-group">
  <label for="TemplateContent">Mail Content <span class="text-danger"> *</span></label>
    <textarea class="nicEdit tinymce form-control @error('content') is-invalid @enderror" 
              name="content" 
              id="TemplateContent" 
              rows="12">{{old('content', isset($mailTemplate->content) ? $mailTemplate->content : '')}}</textarea>

</div>

<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($mailTemplate) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.mail-template.index') }}">Cancel</a>