@extends('user.user_master')

@section('Tittle', 'Wire Transactions')




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
              <th>Status</th>
              <th>Date</th>
              <th>Sender's Name</th>
              <th>Beneficiary's Name</th>
              <th>IBAN</th>
              <th class="text-center">Amount</th>
              <th class="text-right">Account</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($history as $item)
            @if($item->status == 'approved')
            
                 <tr class="clickable" onclick="window.location='/wire-transaction-history/{{$item->id}}'">
                    
                      <td>
                              <span class="status-pill smaller green"></span>
                                <span>Complete</span>
                            </td>
                      <td>
                              <span>{{date('d-M', strtotime($item->created_at))}}</span
                              ><span class="smaller lighter">{{date('h:m A', strtotime($item->created_at))}}</span>
                            </td>
                      <td >
                              <span>{{ $users->first_name }} {{ $users->surname }}</span>
                      </td>
                      <td >
                              <span>{{ $item->acct_name }}</span>
                      </td>
                      <td >
                              <span class="badge badge-danger">{{Str::mask($item->iban,'*',6,8)}}</span>
                      </td>
                      
                      @if($item->currency == 'Euro' || $item->currency == 'Euros')
                      <td class="text-right bolder nowrap">
                        <span class="text-danger">-€{{ number_format($item->amount, 2) }}</span>
                      </td>
                      @elseif($item->currency == 'Pounds')
                      <td class="text-right bolder nowrap">
                        <span class="text-danger"> -£{{ number_format($item->amount, 2) }}</span>
                      </td>
                      @else
                      <td class="text-right bolder nowrap">
                        <span class="text-danger"> -${{ number_format($item->amount, 2) }}</span>
                      </td>
                      @endif

                      @if($item->currency == 'Euro')
                      <td class="text-right bolder nowrap">
                        <span>{{ $item->currency }} Account</span>
                      </td>
                      @elseif($item->currency == 'Pounds')
                      <td class="text-right bolder nowrap">
                        <span>{{ $item->currency }} Account</span>
                      </td>
                      @else
                      <td class="text-right bolder nowrap">
                        <span>{{ $item->currency }} Account</span>
                      </td>
                      @endif
                  
                  
                </tr>
                @else
                <tr>
                    
                      <td>
                              <span class="status-pill smaller red"></span>
                                <span>Not Complete</span>
                            </td>
                      <td>
                              <span>{{date('d-M', strtotime($item->created_at))}}</span
                              ><span class="smaller lighter">{{date('h:m A', strtotime($item->created_at))}}</span>
                            </td>
                      <td >
                              <span>{{ $users->first_name }} {{ $users->surname }}</span>
                      </td>
                      <td >
                              <span>{{ $item->acct_name }}</span>
                      </td>
                      <td >
                              <span class="badge badge-danger">{{Str::mask($item->iban,'*',6,8)}}</span>
                      </td>
                      
                      @if($item->currency == 'Euro' || $item->currency == 'Euros')
                      <td class="text-right bolder nowrap">
                        <span class="text-danger">-€{{ number_format($item->amount, 2) }}</span>
                      </td>
                      @elseif($item->currency == 'Pounds')
                      <td class="text-right bolder nowrap">
                        <span class="text-danger"> -£{{ number_format($item->amount, 2) }}</span>
                      </td>
                      @else
                      <td class="text-right bolder nowrap">
                        <span class="text-danger"> -${{ number_format($item->amount, 2) }}</span>
                      </td>
                      @endif

                      @if($item->currency == 'Euro')
                      <td class="text-right bolder nowrap">
                        <span>{{ $item->currency }} Account</span>
                      </td>
                      @elseif($item->currency == 'Pounds')
                      <td class="text-right bolder nowrap">
                        <span>{{ $item->currency }} Account</span>
                      </td>
                      @else
                      <td class="text-right bolder nowrap">
                        <span>{{ $item->currency }} Account</span>
                      </td>
                      @endif
                  
                  
                </tr>
            @endif
            @endforeach
           
            
          </tbody>
        </table>
       
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>
  
 

</div>
</div>
</div>
</div>

<div aria-hidden="true" class="onboarding-modal modal fade animated" id="onboardingFormModal" role="dialog"
tabindex="-1">
<div class="modal-dialog modal-centered" role="document">
<div class="modal-content text-center">
    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
        <span class="close-label">Skip Intro</span><span class="os-icon os-icon-close"></span>
    </button>
    <div class="onboarding-media">
        <img alt="" src="img/bigicon5.png" width="200px" />
    </div>
    <div class="onboarding-content with-gradient">
        <h4 class="onboarding-title">
            Example Request Information
        </h4>
        <div class="onboarding-text">
            In this example you can see a form where you can
            request some additional information from the
            customer when they land on the app page.
        </div>
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Your Full Name</label><input class="form-control"
                            placeholder="Enter your full name..." value="" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Your Role</label><select class="form-control">
                            <option>Web Developer</option>
                            <option>Business Owner</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection