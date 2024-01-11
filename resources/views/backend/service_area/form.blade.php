<div class="form-row">
   <div class="col-md-12 mb-3">
      <label for="title">Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', isset($serviceArea->name) ? $serviceArea->name : '') }}" >
   </div>

</div>
<button class="btn btn-primary btn-pill mr-2" type="submit">{{ isset($serviceArea) ? 'Update' : 'Save' }}</button>
<a class="btn btn-light btn-pill" href="{{ route('admin.service-area.index') }}">Cancel</a>

