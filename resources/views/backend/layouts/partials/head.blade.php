<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title> {{ !empty($setting['site_title']) ? $setting['site_title'] : config('constants.APP_NAME') }} | @yield('title')</title>
<!-- theme meta -->
<meta name="theme-name" content="mono" />
<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
<link href="{{ asset('backend_assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
<link href="{{ asset('backend_assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
<!-- PLUGINS CSS STYLE -->
<link href="{{ asset('backend_assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
<link href="{{ asset('backend_assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
<link href="{{ asset('backend_assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="{{ asset('backend_assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<!-- MONO CSS -->
<link id="main-css-href" rel="stylesheet" href="{{ asset('backend_assets/css/style.css') }}" />
<!-- FAVICON -->
<link href="{{ asset('backend_assets/images/favicon.png') }}" rel="shortcut icon" />
<!-- Summernote Editor -->
{{-- <link href="{{ asset('backend_assets/libs/summernote/summernote-bs4.min.css') }}" rel="stylesheet"> --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
{{-- Datepicker --}}

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/> --}}
{{-- Bootstrap-Select --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> --}}
<script src="{{ asset('backend_assets/plugins/nprogress/nprogress.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.1/jquery.timepicker.min.css"/>


<!-- Include Bootstrap DateTimePicker CDN -->
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
@stack('backend-stylesheet')