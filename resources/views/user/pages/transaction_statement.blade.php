@extends('user.user_master')

@section('Tittle', 'Monthly Statement')




@section('body')
<br>
<br>
<br>
<div class="col-md-1"></div>
<div class="col-md-11 content-i">
    <div class="col-md-12 content-box">
      
      <div class="col-md-12 element-wrapper">
        
        <div class="col-md-12 invoice-w">
          
          <div class="infos">
            <div class="info-1">
              <div class="invoice-logo-w">
                <img alt="" src="img/logo2.png" />
              </div>
              <!--<div class="company-name">Raxa</div>-->
          <div class="invoice-heading">
            <h3>Monthy Statement</h3>
            <div class="invoice-date"></div>
          </div>
          <div class="col-md-12 invoice-body">
            <div class="invoice-desc">
              
              
            </div>

            
            <div class="col-md-12 invoice-table">
              <table class=" table">
                <thead>
                    
                  <tr>
                       <th>Status</th>
                    <th>Account</th>
                   
                    <th>Amount</th>
                    <th class="text-right">Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($statement as $item)
                    @if( date('m', strtotime($item->created_at)) > $time)
                  <tr>
                      <td>
                        {{ $item->acct_name }}<br>
                        @if($item->acct_number == $users->acct_number)
                        <p class="badge badge-success">{{ Str::mask($item->acct_number,'*',3,4) }}</p><br>
                        @else
                        <p class="badge badge-danger">{{ Str::mask($item->acct_number,'*',3,4) }}</p><br>
                        @endif
                        <p class="badge badge-warning">{{ $item->Description }}</p>
                      </td>
                    @if($item->acct_number == $users->acct_number)
                      <td class="bolder nowrap">
                        <span class="text-success">+ {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @else
                      <td class="bolder nowrap">
                        <span class="text-danger">- {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @endif
                      <td>
                        {{date('d-M-y', strtotime($item->created_at))}}
                      </td>
              
                  </tr>
                  @endif
                  @endforeach
                  @foreach ($wstatement as $item)
                    @if( date('m', strtotime($item->created_at)) > $time)
                    @if($item->status == 'approved')
                  <tr>
                      <td>
                          <span class="status-pill smaller green"></span>
                                <span>Complete</span>
                      </td>
                      <td>
                           
                        {{ $item->acct_name }}<br>
                        @if($item->acct_number == $users->acct_number)
                        <p class="badge badge-success">{{ Str::mask($item->acct_number,'*',3,4) }}</p><br>
                        @else
                        <p class="badge badge-danger">{{ Str::mask($item->acct_number,'*',3,4) }}</p><br>
                        @endif
                        <p class="badge badge-warning">{{ $item->description }}</p>
                      </td>
                    @if($item->acct_number == $users->acct_number)
                      <td class="bolder nowrap">
                        <span class="text-success">+ {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @else
                      <td class="bolder nowrap">
                        <span class="text-danger">- {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @endif
                      <td>
                        {{date('d-M-y', strtotime($item->created_at))}}
                      </td>
              
                  </tr>
                  @else
                  <tr>
                      <td>
                          <span class="status-pill smaller red"></span>
                                <span>Not Complete</span>
                      </td>
                      <td>
                           
                        {{ $item->acct_name }}<br>
                        @if($item->acct_number == $users->acct_number)
                        <p class="badge badge-success">{{ Str::mask($item->acct_number,'*',3,4) }}</p><br>
                        @else
                        <p class="badge badge-danger">{{ Str::mask($item->acct_number,'*',3,4) }}</p><br>
                        @endif
                        <p class="badge badge-warning">{{ $item->description }}</p>
                      </td>
                    @if($item->acct_number == $users->acct_number)
                      <td class="bolder nowrap">
                        <span class="text-success">+ {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @else
                      <td class="bolder nowrap">
                        <span class="text-danger">- {{ number_format($item->amount, 2) }} USD</span>
                      </td>
                      @endif
                      <td>
                        {{date('d-M-y', strtotime($item->created_at))}}
                      </td>
              
                  </tr>
                  @endif
                  
                  @endif
                  @endforeach
                </tbody>
              </table>
              <!--<div class="terms">-->
              <!--  <div class="terms-header">Please Note</div>-->
              <!--  <div class="terms-content">-->
              <!--    This receipt was generated immediately this transaction was executed. -->
              <!--    Incase if the transaction did not reflect, please wait for 24hours before complaint.-->
              <!--  </div>-->
              <!--</div>-->
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
          
        </div>
        
      </div>
     
    </div>
  </div>

@endsection