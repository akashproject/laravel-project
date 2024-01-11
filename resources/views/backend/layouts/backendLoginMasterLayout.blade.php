<!DOCTYPE html>
<html lang="en">
<head>
  <head>
      @include('backend.layouts.partials.head')
   </head>
</head>
  <body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card card-default mb-0">
            <div class="card-header pb-0">
              <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                <a class="w-auto pl-0" href="#">
                  <img src="{{ !empty($setting['site_logo']) ? asset('storage/site_settings/'.$setting['site_logo']) : asset('backend_assets/images/logo.png') }}" alt="Mono">
                  {{-- <span class="brand-name text-dark">{{ !empty($setting['site_title']) ? $setting['site_title'] : config('constants.APP_NAME') }}</span> --}}
                </a>
              </div>
            </div>
            <div class="card-body px-5 pb-5 pt-0">
              {{-- <h4 class="text-dark mb-6 text-center">Sign in</h4> --}}
              @yield('backendLoginContent')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
