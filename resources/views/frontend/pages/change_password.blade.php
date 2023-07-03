@extends('frontend.frontend_master')


@section('body')


@section('Tittle', 'Change Password')


<div class="breadcrumb-wrap bg-spring">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-1.png') }}" alt="Image" class="br-shape-one xs-none">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-2.png') }}" alt="Image" class="br-shape-two xs-none">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-3.png') }}" alt="Image" class="br-shape-three moveHorizontal sm-none">
    <img src="{{ asset('frontend/assets/img/breadcrumb/br-shape-4.png') }}" alt="Image" class="br-shape-four moveVertical sm-none">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-7 col-md-8 col-sm-8">
    <div class="breadcrumb-title">
    <h2>Change Password</h2>
    <ul class="breadcrumb-menu list-style">
    <li><a href="/">Home </a></li>
    <li>Change Password</li>
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
    <div class="row">
    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
    <div class="login-form-wrap">
    <div class="login-header">
    <h3>New Password</h3>
    </div>
    <div class="login-form">
    <div class="login-body">
    <form class="form-wrap" Method="POST" action="{{ route('change_password_submit') }}">
        @csrf
        @if(session()->get('error'))
        <div class="text-danger">{{ session()->get('error') }}</div>
        @endif
        @if(session()->get('success'))
        <div class="text-success">{{ session()->get('success') }}</div>
        @endif

        <input value="{{ $token }}" name="token" type="hidden">
        <input value="{{ $email }}" name="email" type="hidden">
    <div class="row">
    <div class="col-lg-12">
    <div class="form-group">
        <input id="pwd" name="password" type="password" placeholder="New Password">
    </div>
    @error('password')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
    <div class="col-lg-12">
    <div class="form-group">
    <input id="pwd" name="pwd" type="password" placeholder="Retype Password">
    </div>
    @error('pwd')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-12">
    <div class="form-group mb-0">
    <button class="btn style1 w-100 d-block">
    Submit
    </button>
    </div>
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