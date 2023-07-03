@extends('admin.admin_master')

@section('body')


<div class="main-content">
    <section class="section">
            <div class="section-header">
                <h1> Reply User </h1>
                
            </div>
        <div class="section-body">
            <form action="{{ route('send_user_message') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(session()->get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                              <span aria-hidden="true"> &times;</span></button>
                              <strong>{{ session()->get('success') }} &#128578;</strong>
                            </div>
                            @endif

                            @if(session()->get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true"> &times;</span></button>
                                <h6>{{ session()->get('error') }} 	&#128543;</h6>
                            </div>
                        @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">
                                
                                
                                <h5>Reply {{ $email }}</h5>
                                    <div class="form-group mb-3">
                                    <div class="form-group mb-3">

                                    <div class="form-group mb-3">
                                        
                                        <input type="text" class="form-control" name="email" value="{{ $email }}">
                                    </div>
                                    @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                    <div class="form-group mb-3">
                                        <label>Message</label>
                                        <textarea class="form-control snote" name="message" rows="3"></textarea>
                                    </div>
                                    @error('message')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                             <div class="form-group">
                            <button type="submit" class="btn btn-primary">Reply</button>
                        </div>
                        </div>
                        </div>
                    </div>
            </form>
        </div>
    </section>
</div>
@endsection