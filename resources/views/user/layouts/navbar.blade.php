@php
use App\Models\Notify;

    $notification = Notify::with('rUser')->where('user_id',$users->id)->count();
      
        $hour = date('H');
@endphp


       

  <div class="layout-w">
    <div class="menu-mobile menu-activated-on-click color-scheme-dark">
      <div class="mm-logo-buttons-w">
        <span class="mm-logo">
          @if($hour < 12)
          Good morning {{ $users->surname }}, &#127749;
          @elseif($hour < 18)
          Good afternoon {{ $users->surname }}, &#127751;
          @else
          Good evening {{ $users->surname }}, &#127747;
          @endif
        </span>
        <div class="mm-buttons">
          <div class="content-panel-open">
            <div class="os-icon os-icon-grid-circles"></div>
          </div>
          <div class="mobile-menu-trigger">
            <div class="os-icon os-icon-hamburger-menu-1"></div>
          </div>
        </div>
      </div>
      <div class="menu-and-user">
        <div class="logged-user-w">
          <div class="avatar-w">
            @if ($users->show_profile_on_dashboard == 'Show')
                            <img alt="" src="{{ asset('user/clients/img/'.$users->photo) }}" />
                            @else
                            <img alt="" src="{{ asset('user/img/profile.png') }}" />
                            @endif
          </div>
          <div class="logged-user-info-w">
            <div class="logged-user-name">{{ $users->first_name }}</div>
            <div class="logged-user-role">{{ $users->acct_type }}</div>
          </div>
        </div>
        <ul class="main-menu">
          <li>
            <a href="{{ route('user_dashboard') }}">
            <div class="icon-w">
              <div class="picons-thin-icon-thin-0418_bank_pantheon"></div>
            </div>
            <span>Overview</span>
          </a>
        </li>
  
  
          <li class="selected has-sub-menu">
            <a
              ><div class="icon-w">
                <div  class="picons-thin-icon-thin-0419_payment_mobile_nfc_apple_pay_cashless"></div>
              </div>
              <span>New Transfer</span></a
            >
            <div class="sub-menu-w">
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li><a href="{{ route('send_money') }}">Local Transfer</a></li>
                  <li><a href="{{ route('wire_money') }}">Wire Transfer</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li>
            <a href="{{ route('transactions') }}">
            <div class="icon-w">
              <div class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></div>
            </div>
            <span>Transactions</span>
          </a>
        </li>
        <li>
          <a href="{{ route('wire_transaction') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0425_money_payment_dollar_cash"></div>
          </div>
          <span>Wire Transactions</span>
        </a>
      </li>
        <li>
          <a href="{{ route('exchange') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></div>
          </div>
          <span>Exchange</span>
        </a>
      </li>
        <li>
          <a href="{{ route('loans') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0394_business_handshake_deal_contract_sign"></div>
          </div>
          <span>Loans</span>
        </a>
      </li>
          <li class="sub-header"><span>Options</span></li>
          <li>
            <a href="{{ route('notification') }}">
            <div class="icon-w">
              <div class="picons-thin-icon-thin-0303_notification_badge"></div>
            </div>
            <span>Notifications</span>
          </a>
        </li>
          <li>
            <a href="{{ route('billing_info') }}">
            <div class="icon-w">
              <div class="picons-thin-icon-thin-0714_identity_card_photo_user_profile"></div>
            </div>
            <span>Billing Info</span>
          </a>
        </li>
        <li>
          <a href="{{ route('customer_support') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0304_chat_contact_support_help_conversation"></div>
          </div>
          <span>Customer Support</span>
        </a>
      </li>
      <li>
            <a href="{{ route('user_logout') }}"><i
                    class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
        </li>
        </ul>
      </div>
    </div>
    <div
      class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link"
    >
      <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
          <div class="avatar-w">
            @if ($users->show_profile_on_dashboard == 'Show')
                            <img alt="" src="{{ asset('user/clients/img/'.$users->photo) }}" />
                            @else
                            <img alt="" src="{{ asset('user/img/profile.png') }}" />
                            @endif
          </div>
          <div class="logged-user-info-w">
            <div class="logged-user-name">{{ $users->first_name }}</div>
            <div class="logged-user-role">{{ $users->acct_type }}</div>
          </div>
         
        </div>
      </div>
      
      <h1 class="menu-page-header">Page Header</h1>
      <ul class="main-menu">
        <li class="sub-header"><span>Functions</span></li>
       <li>
          <a href="{{ route('user_dashboard') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0418_bank_pantheon"></div>
          </div>
          <span>Overview</span>
        </a>
      </li>


        <li class="selected has-sub-menu">
          <a
            ><div class="icon-w">
              <div  class="picons-thin-icon-thin-0419_payment_mobile_nfc_apple_pay_cashless"></div>
            </div>
            <span>New Transfer</span></a
          >
          <div class="sub-menu-w">
            <div class="sub-menu-header">New Transfer</div>
            <div class="sub-menu-icon">
              <i class="os-icon os-icon-layout"></i>
            </div>
            <div class="sub-menu-i">
              <ul class="sub-menu">
                <li><a href="{{ route('send_money') }}">Local Transfer</a></li>
                <li><a href="{{ route('wire_money') }}">Wire Transfer</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li>
          <a href="{{ route('transactions') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></div>
          </div>
          <span>Transactions</span>
        </a>
      </li>
        <li>
          <a href="{{ route('wire_transaction') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0425_money_payment_dollar_cash"></div>
          </div>
          <span>Wire Transactions</span>
        </a>
      </li>
        <li>
          <a href="{{ route('exchange') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></div>
          </div>
          <span>Exchange</span>
        </a>
      </li>
        <li>
          <a href="{{ route('loans') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0394_business_handshake_deal_contract_sign"></div>
          </div>
          <span>Loans</span>
        </a>
      </li>
        <li class="sub-header"><span>Options</span></li>
        <li>
          <a href="{{ route('notification') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0303_notification_badge"></div>
          </div>
          <span>Notifications</span>
        </a>
      </li>
        <li>
          <a href="{{ route('billing_info') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0714_identity_card_photo_user_profile"></div>
          </div>
          <span>Billing Infomations</span>
        </a>
      </li>
        <li>
          <a href="{{ route('customer_support') }}">
          <div class="icon-w">
            <div class="picons-thin-icon-thin-0304_chat_contact_support_help_conversation"></div>
          </div>
          <span>Customer Support</span>
        </a>
      </li>
      <li>
            <a href="{{ route('user_logout') }}"><i
                    class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
        </li>
       
      </ul>
    </div>