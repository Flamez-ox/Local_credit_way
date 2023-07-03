<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layouts.styles')
</head>
<body>

<div class="loader js-preloader">
<div></div>
<div></div>
<div></div>
</div>


<div class="switch-theme-mode">
<label id="switch" class="switch">
<input type="checkbox" onchange="toggleTheme()" id="slider">
<span class="slider round"></span>
</label>
</div>


<div class="page-wrapper">

@include('frontend.layouts.header')


@yield('body')


@include('frontend.layouts.footer')

</div>


<a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>


@include('frontend.layouts.scripts')
</body>

<!-- Mirrored from templates.hibootstrap.com/raxa/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Nov 2022 13:53:00 GMT -->
</html>