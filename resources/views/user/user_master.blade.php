<!DOCTYPE html>
<html>
  <!-- Mirrored from light.pinsupreme.com/apps_bank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 May 2023 13:33:58 GMT -->
  <head>
    @include('user.layouts.styles')
  </head>
  <body class="menu-position-side menu-side-left full-screen">
    <div class="all-wrapper solid-bg-all">
    
        @include('user.layouts.header')

@include('user.layouts.navbar')

            @yield('body')
            @include('user.layouts.floated')
      </div>
      <div class="display-type"></div>
    </div>
        @include('user.layouts.scripts')
  </body>
  <!-- Mirrored from light.pinsupreme.com/apps_bank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 May 2023 13:35:53 GMT -->
</html>
