<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.s7template.com/tf/bankapp/user-verification.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Nov 2022 13:49:28 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>User Verification</title>

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/responsive.css') }}">
</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <div class="body-overlay" id="body-overlay"></div>
    </div>
    <!-- //. search Popup -->

    <!-- header start -->
    <div class="header-area" style="background-image: url({{ asset('user/assets/img/bg/1.png)') }};">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <a class="menu-back-page" href="{{ route('user_dashboard') }}">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
                <div class="col-sm-4 col-6 text-center">
                    <div class="page-name">User Verification</div>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- page-title stary -->
    <div class="page-title mg-top-50">
        <div class="container">
            {{-- <a class="float-left" href="{{ route('user_dashboard') }}">Dashboard</a> --}}
            <span class="float-right">User Verification</span>
        </div>
    </div>
    <div class="ba-page-name text-center mg-bottom-40">
        <h3>Verification</h3>
    </div>
    <!-- page-title end -->

    <!-- singin-area start -->
    <div class="signin-area">
        <div class="container">
            <form action="{{ route('verify_pin') }}" method="POST" class="verification-inner text-center" style="background-image: url({{ asset('user/assets/img/bg/14.png)') }}">
                @csrf
                <input value="{{$id}}" name="id" type="hidden">

                @if(session()->get('error'))
                <div class="text-danger">{{ session()->get('error') }}</div>
                @endif
                @if(session()->get('success'))
                <div class="text-success">{{ session()->get('success') }}</div>
                @endif
                <h3>Enter SMS Verification 6 Digit Code</h3>
                <input name="pin" type="text" placeholder="......">
                
                
                @error('pin')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="verify-btn">
                    <button >VerifY</button>
                </div>
                
            </form>
        </div>
    </div>
    <!-- singin-area End -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="{{ asset('user/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('user/assets/js/main.js') }}"></script>

</body>


<!-- Mirrored from www.s7template.com/tf/bankapp/user-verification.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Nov 2022 13:49:28 GMT -->
</html>