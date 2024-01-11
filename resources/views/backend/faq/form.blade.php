<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="question">Question</label>
      <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="question" value="{{ old('question', isset($faq->question) ? $faq->question : '') }}" >
   </div>
   <div class="col-md-12 mb-3">
      <label for="answer">Answer</label>
      <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" id="answer">{{ old('answer', isset($faq->answer) ? $faq->answer : '') }}</textarea>
   </div>
</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($faq) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.faq.index') }}">Cancel</a>
