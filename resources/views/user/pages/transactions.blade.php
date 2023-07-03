@extends('user.user_master')

@section('Tittle', 'Transactions')




@section('body')
<br>
<br>
<br>
<div class="col-md-1"></div>
<div class="col-md-8 element-wrapper">
    <h4 class="element-header">Transactions</h4>
    <div class="element-box-tp">
        <div class="balance-link">
            <a class="btn btn-link btn-underlined" href="{{ route('transaction_statement') }}"
              ><span>View Monthly Statement</span
              ><i class="os-icon os-icon-arrow-right4"></i
            ></a>
          </div>
      <div class="table-responsive">
        <table class="table table-padded">
          <thead>
            <tr>
              {{-- <th>Status</th> --}}
              <th>Date</th>
              <th>Account</th>
              {{-- <th class="text-center">Account</th> --}}
              <th class="text-right">Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($history as $item)
            
                 <tr class="clickable" onclick="window.location='/transaction-history/{{$item->id}}'">
                    
                      <td>
                              <span>{{date('d-M', strtotime($item->created_at))}}</span
                              ><span class="smaller lighter">{{date('h:m A', strtotime($item->created_at))}}</span>
                            </td>
                      <td >
                              <span>{{ $item->acct_name }}</span>
                      </td>
                      <!-- @if($item->acct_number == $users->acct_number)-->
                      <!--<td class="text-center">-->
                      <!--  <a class="badge badge-success" href="#">{{ Str::mask($item->acct_number,'*',4,7) }}</a>-->
                      <!--</td>-->
                      <!--@else-->
                      <!--<td class="text-center">-->
                      <!--  <a class="badge badge-danger" href="#">{{ Str::mask($item->acct_number,'*',4,7) }}</a>-->
                      <!--</td>-->
                      <!--@endif-->

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
            
            @endforeach
           
            
          </tbody>
        </table>
       
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>
  
</div>
@endsection