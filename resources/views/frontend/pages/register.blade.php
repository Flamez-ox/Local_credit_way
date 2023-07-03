@extends('frontend.frontend_master')


@section('body')


@section('Tittle', 'Register-User')


<div class="breadcrumb-wrap bg-spring">
    
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-1.png') }}" alt="Image" class="br-shape-one xs-none">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-2.png') }}" alt="Image" class="br-shape-two xs-none">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-3.png') }}" alt="Image" class="br-shape-three moveHorizontal sm-none">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-4.png') }}" alt="Image" class="br-shape-four moveVertical sm-none">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-7 col-md-8 col-sm-8">
    <div class="breadcrumb-title">
    <h2>Register</h2>
    <ul class="breadcrumb-menu list-style">
    <li><a href="/">Home </a></li> 
    <li>Register</li>
    </ul>
    </div>
    </div>
    <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
    <div class="breadcrumb-img">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-5.png') }}" alt="Image" class="br-shape-five animationFramesTwo">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-6.png') }}" alt="Image" class="br-shape-six bounce">
    <img src="{{ asset('frontend/assets/img/breadcrumb/breadcrumb-3.png') }}" alt="Image">
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    <section class="Login-wrap ptb-100">
    <div class="container">
    <div class="row ">
    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
    <div class="login-form-wrap">
    <div class="login-header">
    <h3>Register New Account</h3>
    <p>Welcome!! Create A New Account</p>
    </div>
    <div class="login-form">
    <div class="login-body">
    <form class="form-wrap" method="POST" action="{{ route('register_user_submit') }}" enctype="multipart/form-data">
        @csrf
        @if(session()->get('error'))
        <div class="text-danger">{{ session()->get('error') }}</div>
        @endif
        @if(session()->get('success'))
        <div class="text-success">{{ session()->get('success') }}</div>
        @endif
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <input id="text" name="first_name" type="text" placeholder="First Name" required>
    </div>
    @error('first_name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="text" name="surname" type="text" placeholder="Surname" required>
    </div>
    @error('surname')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="email" name="email" type="email" placeholder="Email" required>
    </div>
    @error('email')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="address" name="address" type="text" placeholder="Address  Postal Code   City" required>
    </div>
    @error('address')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
        <label>Date of birth</label>
    <input id="date_of_birth" name="date_of_birth" type="date" placeholder="Date of Birth" required>
    </div>
    @error('date_of_birth')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="residence" name="residence" type="text" placeholder="Residence Country" required>
    </div>
    @error('residence')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="country" name="country" type="text" placeholder="Citizenship" required>
    </div>
    @error('country')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="phone" name="phone" type="number" placeholder="Phone" required>
    </div>
    @error('phone')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <select class="form-select" id="acct_type" name="acct_type" required>
        <option value="">Account Type</option>
        <option value="Savings">Savings</option>
        <option value="Current">Current</option>
        <option value="Business">Business</option>
    </select>
    </div>
    @error('acct_type')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
        <select class="form-select" id="gender" name="gender" required>
            <option value="Gender">Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Rather not say">Rather not Say</option>
        </select>
    </div>
    @error('gender')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="pwd" name="password" type="password" placeholder="Password" required>
    </div>
    @error('password')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <input id="pwd_2" name="pwd" placeholder="Confirm Password" type="password" required>
    </div>
    @error('retype_password')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-6">
        <label>Optional</label>
    <div class="form-group">
    <input id="file" name="photo" placeholder="Photo" type="file" required>
    </div>
    @error('photo')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-sm-12 col-12 mb-20">
    <div class="checkbox style3">
    <input type="checkbox" name="checkbox" id="test_1">
    <label for="test_1">
    I Agree with the <a class="link style1" href="terms-of-service.html">Terms &amp; conditions</a>
    </label>
    </div>
    @error('checkbox')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
     <div class="col-lg-12">
    <div class="form-group">
    <button class="btn style1">
    Register Now
    </button>
    </div>
    </div>
    <div class="col-md-12">
    <p class="mb-0">Have an Account? <a class="link style1" href="{{ route('user_login') }}">Sign In</a></p>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>


@endsection