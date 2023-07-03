@extends('user.user_master')

@section('Tittle', 'Exchange currency')


@section('body')
<div class="element-wrapper">
    <h6 class="element-header">Exchange Currency</h6>
    <div class="element-box">
      <h5 class="form-header">Exchange</h5>
      <div class="form-desc">
        Discharge best employed your phase each the of shine. Be met
        even reason consider logbook redesigns. Never a turned
        interfaces among asking
      </div>
      <form class="form-inline" id="currency-exchange-rate" action="#" method="">

        <input type="text" name="amount" class="form-control" value="1"> 
        <br>
        <br>
        <br>
        <div class="col-md-4">
            <select name="from_currency" class="form-control"> 
            <option value='AUD'>AUD</option>
            <option value='BGN'>BGN</option>
            <option value='BRL'>BRL</option>
            <option value='CAD'>CAD</option>
            </select>
            </div>
       <br>
       <br>
       <br>
            <div class="col-md-4">
                <select name="to_currency" class="form-control">
                <option value='AUD'>AUD</option>
                <option value='BGN'>BGN</option>
                <option value='BRL'>BRL</option>
                <option value='CAD'>CAD</option>
                </select>
                </div>
                <br>
                <br>
                <br>
                <input type="submit" name="submit" id="btnSubmit" class="btn btn-primary " value="Click To Exchange Rate">
      </form>
    </div>
  </div>

<script>
  $(document).ready(function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $("#btnSubmit").click(function (event) {
    //stop submit the form, we will post it manually.
    event.preventDefault();
    // Get form
    var form = $('#currency-exchange-rate')[0];
    // Create an FormData object 
    var data = new FormData(form);
    // disabled the submit button
    $("#btnSubmit").prop("disabled", true);
    $.ajax({
    type: "POST",
    url: "{{ url('currency') }}",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 800000,
    success: function (data) {
    $("#output").html(data);
    $("#btnSubmit").prop("disabled", false);
    },
    error: function (e) {
    $("#output").html(e.responseText);
    console.log("ERROR : ", e);
    $("#btnSubmit").prop("disabled", false);
    }
    });
    });
    });
    </script>
@endsection