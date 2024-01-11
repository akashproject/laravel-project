<!DOCTYPE html>
<!--
   // WEBSITE: https://themefisher.com
   // TWITTER: https://twitter.com/themefisher
   // FACEBOOK: https://www.facebook.com/themefisher
   // GITHUB: https://github.com/themefisher/
   -->
<html lang="en" dir="ltr">
   <head>
      @include('backend.layouts.partials.head')
   </head>
   <body class="navbar-fixed sidebar-fixed" id="body">
      <script>
         NProgress.configure({ showSpinner: false });
         NProgress.start();
      </script>
      {{-- <div id="toaster"></div> --}}
      <!-- ====================================
         ——— WRAPPER
         ===================================== -->
      <div class="wrapper">
         <!-- ====================================
            ——— LEFT SIDEBAR WITH OUT FOOTER
            ===================================== -->
         <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            @include('backend.layouts.partials.sidebar')
         </aside>
         <!-- ====================================
            ——— PAGE WRAPPER
            ===================================== -->
         <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header" id="header">
              @include('backend.layouts.partials.header')
            </header>
            <!-- ====================================
               ——— CONTENT WRAPPER
               ===================================== -->
            <div class="content-wrapper">
               <div class="content">
                  @yield('backendContent')
               </div>
            </div>
            <!-- Footer -->
            <footer class="footer mt-auto">
              @include('backend.layouts.partials.footer')
            </footer>
         </div>
      </div>
      <!-- Card Offcanvas -->
      {{-- its no use --}}
      @include('backend.layouts.partials.rightbar') 
      
      @include('backend.layouts.partials.scripts')
      <!--  -->
   </body>
</html>