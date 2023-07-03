@extends('user.user_master')

@section('Tittle', 'Notifications')




@section('body')


<div class="content-i col-md-12">
    <div class="content-box">
      <div class="app-email-w col-md-12">
        <div class="app-email col-md-6">
          @if(session()->get('error'))
        <div class="text-danger">{{ session()->get('error') }}</div>
        @endif
        @if(session()->get('success'))
        <div class="text-success">{{ session()->get('success') }}</div>
        @endif
          <div class="ae-list-w col-md-12">
            <a href="{{route('all_notification')}}">Delete all notifications</a>
            <div class="ae-list col-md-12">
              @foreach($notification as $item)
              <div class="ae-item with-status status-green">
                <div class="aei-image">
                  <div class="user-avatar-w">
                    
                  </div>
                </div>
                <div class="clickable" onclick="window.location='/notification-delete/{{$item->id}}'">
                  <div class="aei-timestamp">{{date('d-M-Y', strtotime($item->created_at))}}</div>
                  <div class="aei-sub-title">
                    New Notification
                  </div>
                  <div class="aei-text">
                    {{ $item->notifications }}
                  </div>
                </div>
                      <div class="text-right">
                        <a class="button button-danger" href="{{ route('delete_notification', $item->id) }}"
                        ><i class="os-icon os-icon-ui-15"></i
                      ></a>
                      </div>
                            
              </div>
                            
              @endforeach
              
            </div>
           </div>
    </div>
  </div>

@endsection