@extends('user.user_master')

@section('Tittle', 'Loans')


@section('body')
<div class="element-wrapper">
    <h6 class="element-header">Loans</h6>
    <div class="element-box">
      <h5 class="form-header">WE listen to our Customers &#128578;</h5>
      <div class="form-desc">
        You can contact your Account Officer for help, Use our live chat or Contact your
        Local Branch <a href="">Here</a>
      </div>
      <form class="form-inline">
        <label class="sr-only"> First Name</label
        ><input
          class="form-control mb-2 mr-sm-2 mb-sm-0"
          placeholder="First Name"
        /><label class="sr-only"> Last Name</label
        ><input
          class="form-control mb-2 mr-sm-2 mb-sm-0"
          placeholder="Last Name"
        />
        <label >I.D/Passport: </label
            ><input
              class="form-control mb-2 mr-sm-2 mb-sm-0"
              placeholder="Last Name"
              type="file"
              name="file"
            />
        <button class="btn btn-primary" type="submit">
          Contact an Account Officer
        </button>
      </form>
    </div>
  </div>
@endsection