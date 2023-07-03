@extends('user.user_master')

@section('Tittle', 'Transaction History')




@section('body')
<br>
<br>
<br>
<div class="col-md-1"></div>
<div class="col-md-9 content-i">
    <div class="content-box">
      
      <div class="element-wrapper">
        
        <div class="invoice-w">
          @foreach ($history as $item)
          <div class="infos">
            <div class="info-1">
              <div class="invoice-logo-w">
                <img alt="" src="img/logo2.png" />
              </div>
              <!--<div class="company-name">Raxa</div>-->
          <div class="invoice-heading">
            <h3>Receipt</h3>
            <div class="invoice-date">{{date('d-M-Y', strtotime($item->created_at))}}</div>
          </div>
          <span class="status-pill smaller green"></span>
          <span>Complete</span><br><br>
          <h4>{{ $item->acct_name }}</h4><br><br>
          <div class="invoice-body">
            <div class="invoice-desc">
              <div class="desc-label">Invoice #</div>
              <div class="desc-value">{{ $item->invoice }}</div>
            </div>

            
            <div class="invoice-table">
              <table class="table">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Account</th>
                    <th class="text-right">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @if($item->acct_number == $users->acct_number)
                      <td class="text-center">
                        <a class="badge badge-success" href="#">{{ $item->Description }}</a>
                      </td>
                      @else
                      <td class="text-center">
                        <a class="badge badge-danger" href="#">{{ $item->Description }}</a>
                      </td>
                      @endif
                    <td>{{ Str::mask($item->acct_number,'*',3,4) }}</td>
                    @if($item->acct_number == $users->acct_number)
                      <td class="text-right bolder nowrap">
                        <span class="text-success">+ {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @else
                      <td class="text-right bolder nowrap">
                        <span class="text-danger">- {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @endif
                  </tr>
                </tbody>
              </table>
              <div class="terms">
                <div class="terms-header">Please Note</div>
                <div class="terms-content">
                  This receipt was generated immediately this transaction was executed. 
                  Incase if the transaction did not reflect, please wait for 24hours before complaint.
                </div>
              </div>
            </div>
          </div>
          <div class="invoice-footer">
            <div class="invoice-logo">
              <!--<img alt="" src="img/logo.png" /><span>Raxa</span>-->
            </div>
            <div class="invoice-info">
              <span>support@stmortgage.online</span><span></span>
            </div>
          </div>
          @endforeach
        </div>
        
      </div>
      <div class="col-md-2"></div> 
 

      
    </div>
  </div>

@endsection