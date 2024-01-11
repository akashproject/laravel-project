      <script src="{{ asset('backend_assets/plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/simplebar/simplebar.min.js') }}"></script>
      <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
      <script src="{{ asset('backend_assets/plugins/apexcharts/apexcharts.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/daterangepicker/moment.min.js') }}"></script>
      <script src="{{ asset('backend_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
      {{-- Tinymce Editor --}}

      <script src="{{ asset('backend_assets/vendor/tinymce/tinymce.min.js') }}"></script>
      <script src="{{ asset('backend_assets/js/tinymce.editor.js') }}"></script>
      
      {{-- Datepicker --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.1/jquery.timepicker.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>

      <script>
        jQuery(document).ready(function(){  
            $('.timepicker').timepicker();
            $('.datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0, // Set minDate to 0 to disable all dates before the current date
                defaultDate: new Date()
            });
        }); 
 
      </script>
      <script src="{{ asset('backend_assets/plugins/select2/js/select2.min.js') }}"></script>

      <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
      <script src="{{ asset('backend_assets/plugins/toaster/toastr.min.js') }}"></script>
      <script src="{{ asset('backend_assets/js/mono.js') }}"></script>
      <script src="{{ asset('backend_assets/js/chart.js') }}"></script>
      <script src="{{ asset('backend_assets/js/map.js') }}"></script>
      <script src="{{ asset('backend_assets/js/custom.js') }}"></script>
      {{-- Summmernote Text Editor --}}
      {{-- <script src="{{ asset('backend_assets/libs/summernote/summernote-bs4.min.js') }}"></script> --}}
       {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
      <script>
          $('.summernote').summernote({
            
            height: 200
          });
      </script> --}}
    <script type="text/javascript">
       (function($){
           @if (Session::has('success'))
               toastr.success("{{ Session::get('success') }}");
           @elseif(Session::has('error'))

               toastr.error("{{ Session::get('error') }}");

           @elseif(Session::has('warning'))
               toastr.warning("{{ Session::get('warning') }}");
           @endif
       })(jQuery);
       
       @if ($errors->any())
           @php
               $collection = collect($errors->all());
               $errors = $collection->unique();
           @endphp

           @foreach ($errors as $error)
              toastr.error("{{ __($error) }}");
           @endforeach
       @endif
    </script>
    @if(session()->has('notify'))
        @foreach(session('notify') as $msg)
            <script> 
                "use strict";
                toastr.{{ $msg[0] }}("{{ __($msg[1]) }}"); 
            </script>
        @endforeach
    @endif
    @stack('backend-scripts')