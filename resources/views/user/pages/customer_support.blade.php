@extends('user.user_master')

@section('Tittle', 'Customer Support')


@section('body')
<div class="col-md-12 element-wrapper">
    <h6 class="element-header">Customer Support</h6>
    <div class=" col-md-9 element-box">
      <form action="{{ route('customer_support_submit') }}" method="POST">
        @csrf
        @if(session()->get('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                  <span aria-hidden="true"> &times;</span></button>
                  <h6>{{ session()->get('error') }} 	&#128543;</h6>
              </div>
          @endif
          @if(session()->get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true"> &times;</span></button>
            <strong>{{ session()->get('success') }} &#128578;</strong>
          </div>
          @endif
        <h5 class="form-header">Customer Support</h5>
        <div class="form-group">
          <label for=""> Subject</label
          ><input
            class="form-control"
            placeholder="Enter Subject"
            type="text"
            name="subject"
          />
        </div>
        @error('subject')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
        <fieldset class="form-group">
          <div class="row">
          <div class="col-md-12 form-group">
            <label> Complaint/Message</label
            ><textarea name="message" class="form-control" rows="3"></textarea>
          </div>
        </fieldset>
        @error('message')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
        <div class="form-buttons-w">
          <button class="btn btn-primary" type="submit">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection