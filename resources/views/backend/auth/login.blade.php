@extends('backend.layouts.backendLoginMasterLayout')
@section('title','Login')
@section('backendLoginContent')
<form action="{{ route('admin.login') }}" method="POST">
  {{ csrf_field() }}
  <div class="row">
    <div class="form-group col-md-12 mb-4">
      <input id="email" type="email" name="email" class="form-control input-lg @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Admin Email" value="{{ old('email') }}">
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group col-md-12 ">
      <input type="password" name="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" placeholder="Admin Password">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="col-md-12">

      <div class="d-flex justify-content-between mb-3">

        <div class="custom-control custom-checkbox mr-3 mb-3">
          <input type="checkbox" class="custom-control-input" id="remember" name="remember" id="" {{ old('remember') ? 'checked' : '' }}>
          <label class="custom-control-label" for="remember">Remember me</label>
        </div>

        {{-- <a class="text-color" href="#"> Forgot password? </a> --}}

      </div>

      <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>

      {{-- <p>Don't have an account yet ?
        <a class="text-blue" href="sign-up.html">Sign Up</a>
      </p> --}}
    </div>
  </div>
</form>
@endsection