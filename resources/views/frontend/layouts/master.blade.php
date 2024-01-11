<!DOCTYPE html>
<html lang="en">
	<!-- Stored in head  -->
   @include('frontend.layouts.partials.head')
   <body>
      <div class="main__header">
         @include('frontend.layouts.partials.topbar')
         @include('frontend.layouts.partials.navbar')
      </div>
      @yield('frontendContent')
      
      @include('frontend.layouts.partials.footer')

      @include('common.notify')

      @include('frontend.layouts.partials.scripts')
   </body>
</html>
