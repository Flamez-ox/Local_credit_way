@extends('user.user_master')

@section('Tittle', 'Billing Infomation')


@section('body')
<div class="col-md-12 all-wrapper rentals">
    <div class="col-md-12 top-bar-rentals">
    </div>
    <div class="col-md-12 property-single">
        <div class="property-info-w">
            <div class="col-md-12 property-info-side">
        <div class="col-md-12 side-section">
            <div class="col-md-12 side-section">
              <div class="side-section-header">BILLING INFORMATION</div>
              <div class="side-section-content">
                <div class="property-side-features">
                  <div class="feature">
                    <i class=""></i
                    ><span>{{ $users->first_name.'   '.$users->surname }}</span>
                  </div>
                  <div class="feature">
                    <i class=""></i
                    ><span>{{ $users->acct_number }}</span>
                  </div>
                  <div class="feature">
                    <i class=""></i
                    ><span>{{ $users->iban }}</span>
                  </div>
                  <div class="feature">
                    <i class=""></i
                    ><span>{{ $users->swiftcode }}</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
            </div>
            
      <div
        class="property-media"
        style="background-image: url({{ asset('frontend/img/property3.jpg') }})"
      >
      </div>
      
            <div
            class="side-magic"
            style="background-image: url({{ asset('frontend/img/property2.jpg') }})"
          >
        </div>
      </div>
    </div>
    
  </div>
@endsection