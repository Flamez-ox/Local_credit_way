@extends('user.user_master')

@section('Tittle', 'Send Money')




@section('body')

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">
                <h6>Domestic Transfer</h6>
            </a></li>
    </ul>

    <div class="col-md-6 content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <div class="element-box">
                    <form  method="POST" action="{{ route('send_money_submit') }}">
                        @csrf
                        
                        @if(session()->get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true"> &times;</span></button>
                                <h6>{{ session()->get('error') }} 	&#128543;</h6>
                            </div>
                        @endif
                        
                        

                        <div class="steps-w">
                            <div class="step-triggers">
                                <a class="step-trigger active" href="#stepContent1"></a><a class="step-trigger"
                                    href="#stepContent2"></a><a class="step-trigger" href="#stepContent3"></a>
                            </div>
                            <div class="step-contents">
                                <div class="step-content active" id="stepContent1">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for=""> Account Number</label><input id="acct_number"
                                                    name="acct_number" type="number" class="form-control"
                                                    placeholder="Account Number" />
                                            </div>
                                            @error('acct_number')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-buttons-w text-right">
                                        <a id="transBt" class="btn btn-primary step-trigger-btn" href="#stepContent2">
                                            Continue</a>
                                    </div>
                                </div>
                                <div class="step-content" id="stepContent2">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for=""> Amount</label><input id="amount" name="amount"
                                                type="number" class="form-control" placeholder="Amount" />
                                        </div>
                                        @error('amount')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-buttons-w text-right">
                                        <a class="btn btn-primary step-trigger-btn" href="#stepContent3">
                                            Continue</a>
                                    </div>
                                </div>
                                <div class="step-content" id="stepContent3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""> Name</label><input id="name" name="name"
                                                    class="form-control" placeholder="Name" />
                                            </div>
                                            @error('name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Description</label><input id="description"
                                                    name="description" class="form-control" placeholder="Description" />
                                            </div>
                                            @error('description')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-buttons-w text-right">
                                        <button id="transBtn" class="btn btn-primary">Send Money</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
            </div>

@endsection
