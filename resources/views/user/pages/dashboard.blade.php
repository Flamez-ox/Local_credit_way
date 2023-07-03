@extends('user.user_master')

@section('Tittle', 'User Dashboard')


@section('body')



<div class="content-w">
    <div class="content-i">
      <div class="content-box">
        <div class="element-wrapper compact pt-4">
          <div class="element-actions">
            <a class="btn btn-success btn-sm" href="{{ route('send_money') }}"
              ><i class="os-icon os-icon-grid-10"></i
              ><span>Make Payment</span></a
            >
          </div>
          <h6 class="element-header">Financial Overview</h6>
          <div class="element-box-tp">
            <div class="row">
              <div class="menu-mobile menu-activated-on-click  balance-title"><i>Open on a desktop to see your Euro and Pounds Accounts</i></div>
              <div class="col-lg-7 col-xxl-12">
                                @if(session()->get('success'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true"> &times;</span></button>
                                    <strong>{{ session()->get('success') }} &#128578;</strong>
                                  </div>
                                  @endif
                <div class="element-balances">
                  <div class="balance hidden-mobile">
                    <div class="balance-title ">Pounds</div>
                    <div class="balance-value text-primary">
                      <span>£ {{ number_format($users->acct_pounds, 2) }}</span>
                      {{-- ><span class="trending trending-down-basic"
                        ><span>%12</span
                        ><i class="os-icon os-icon-arrow-2-down"></i
                      ></span> --}}
                    </div>
                    
                  </div>
                  <div class="balance">
                    <div class="balance-title">US dollar</div>
                    <div class="balance-value text-success">${{ number_format($users->acct_balance, 2) }}</div>
                    <div class="balance-link">
                      <a class="btn btn-link btn-underlined" href="#"
                        ><span>Account info</span
                        ><i class="os-icon os-icon-arrow-right4"></i
                      ></a>
                      
                    </div>
                  </div>
                  <div class="balance hidden-mobile">
                    <div class="balance-title">Euro</div>
                    <div class="balance-value">€ {{ number_format($users->acct_euro, 2) }}</div>
                    <div class="balance-link">
                      <a
                        class="btn btn-link btn-underlined btn-gold"
                        href="{{ route('wire_money') }}"
                        ><span>Wire Money</span
                        ><i class="os-icon os-icon-arrow-right4"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="col-lg-5 col-xxl-6">
                <div class="alert alert-warning borderless">
                  <h5 class="alert-heading">
                    Refer Friends. Get Rewarded
                  </h5>
                  <p>
                    You can earn: 15,000 Membership Rewards points for
                    each approved referral – up to 55,000 Membership
                    Rewards points per calendar year.
                  </p>
                  <div class="alert-btn">
                    <a class="btn btn-white-gold" href="#"
                      ><i class="os-icon os-icon-ui-92"></i
                      ><span>Send Referral</span></a
                    >
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-lg-7 col-xxl-6">
            <div class="element-wrapper">
              <div class="element-box">
                <div class="element-actions">
                  <div class="form-group">
                    <select class="form-control form-control-sm">
                      <option selected="true">Last 30 days</option>
                      <option>This Week</option>
                      <option>This Month</option>
                      <option>Today</option>
                    </select>
                  </div>
                </div>
                <h5 class="element-box-header">Balance History</h5>
                <div class="el-chart-w">
                  <canvas
                    data-chart-data="13,28,19,24,43,49,40,35,42,46"
                    height="90"
                    id="liteLineChartV2"
                    width="300"
                  ></canvas>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="col-lg-5 col-xxl-12">
            <div class="element-wrapper">
              <div class="element-box">
                <form>
                  <h5 class="element-box-header">Withdraw Money</h5>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="lighter" for=""
                          >Select Amount</label
                        >
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <input
                            class="form-control"
                            placeholder="Enter Amount..."
                            value="0"
                          />
                          <div class="input-group-append">
                            <div class="input-group-text">USD</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-buttons-w text-right compact">
                    <a class="btn btn-primary" href="{{ route('send_money') }}"
                      ><span>Transfer</span
                      ><i class="os-icon os-icon-grid-18"></i
                    ></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          <div class="element-wrapper">
          <h6 class="element-header">Most Recent Transaction</h6>
          <div class="element-box-tp">
            <div class="table-responsive">
              <table class="table table-padded">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Account</th>
                    <th class="text-right">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($history as $item)
                  @if ($loop->iteration > 1)
                  @break;
                  @endif
                  <tr class="clickable" onclick="window.location='/transaction-history/{{$item->id}}'">
                    
                    <td>
                            <span>{{date('d-M', strtotime($item->created_at))}}</span
                            ><span class="smaller lighter">{{date('h:m A', strtotime($item->created_at))}}</span>
                          </td>
                    <td >
                            <span>{{ $item->acct_name }}</span><br>
                            @if($item->acct_number == $users->acct_number)
                        <p class="badge badge-success">{{ Str::mask($item->acct_number,'*',3,4) }}</p>
                        @else
                        <p class="badge badge-danger">{{ Str::mask($item->acct_number,'*',3,4) }}</p>
                        @endif
                    </td>

                    @if($item->acct_number == $users->acct_number)
                    <td class="text-right bolder nowrap">
                      <span class="text-success">+ ${{ number_format($item->amount, 2) }}</span>
                    </td>
                    @else
                    <td class="text-right bolder nowrap">
                      <span class="text-danger">- ${{ number_format($item->amount, 2) }}</span>
                    </td>
                    
                
                
              </tr>
              @endif
        
              @endforeach
                  @foreach ($whistory as $item)
                  @if($item->status == 'approved')
                  @if ($loop->iteration > 1)
                  @break;
                  @endif
                  <tr class="clickable" onclick="window.location='/wire-transaction-history/{{$item->id}}'">
                    
                    <td>
                            <span>{{date('d-M', strtotime($item->created_at))}}</span
                            ><span class="smaller lighter">{{date('h:m A', strtotime($item->created_at))}}</span>
                          </td>
                    <td >
                            <span>{!! $item->acct_name !!}</span><br>
                            <span class="badge badge-danger">{{Str::mask($item->iban,'*',6,8)}}</span><br>
                            
                    </td>

                   @if($item->currency == 'Euro' || $item->currency == 'Euros')
                      <td class="text-right bolder nowrap">
                        <span class="text-danger">- €{{ number_format($item->amount, 2) }}</span>
                      </td>
                      @elseif($item->currency == 'Pounds')
                      <td class="text-right bolder nowrap">
                        <span class="text-danger">- £{{ number_format($item->amount, 2) }}</span>
                      </td>
                      @else
                      <td class="text-right bolder nowrap">
                        <span class="text-danger">- ${{ number_format($item->amount, 2) }}</span>
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
        
      </div>
    </div>
  </div>
    
@endsection