<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="{{ $page->meta_key ?? $setting['meta_key'] ?? $setting['site_title'] ?? config('app.name') ?? '' }}" />
      <meta name="keywords" content="{{ $page->meta_content ?? $setting['meta_content'] ?? $setting['site_title'] ?? config('app.name') ?? '' }}">
      <title>{{ $setting['site_title'] ?? config('app.name') }} | @yield("title")</title>
      <link rel="icon" type="image/x-icon" href="{{ !empty($setting['favicon']) ? asset('storage/site_settings/'.$setting['favicon']) : asset('frontend_assets/images/favicon.ico') }}" />

      <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
      <link href="{{ asset('frontend_assets/css/styles.css') }}" rel="stylesheet" />
      <link href="{{ asset('frontend_assets/css/font-style.css') }}" rel="stylesheet" />
      <link href="{{ asset('frontend_assets/css/custom-style.css') }}" rel="stylesheet" />
      <link href="{{ asset('frontend_assets/css/responsive.css') }}" rel="stylesheet" />
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"/> --}}
      @stack('frontend-styles')
   </head>