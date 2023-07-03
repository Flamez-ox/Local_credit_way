<div class="top-bar color-scheme-bright">
    <div class="logo-w menu-size">
        <a class="logo" href="">
            <div class="logo-element"></div>
            <div class="logo-label"></div>
        </a>
    </div>
    
    <div class="top-menu-controls">
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
            <a href="{{ route('notification') }}"><i class="os-icon os-icon-mail-14"></i></a>
            <div class="new-messages-count">!</div>
        </div>
        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
            <i class="os-icon os-icon-ui-46"></i>
            <div class="os-dropdown">
                <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
                <ul>
                    <li>
                        <a href="{{ route('profile_setting') }}"><i class="os-icon os-icon-ui-49"></i><span>Profile
                                Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="logged-user-w">
            <div class="logged-user-i">
                <div class="avatar-w">
                    @if ($users->show_profile_on_dashboard == 'Show')
                    <img alt="" src="{{ asset('user/clients/img/'.$users->photo) }}" />
                    @else
                    <img alt="" src="{{ asset('user/img/profile.png') }}" />
                    @endif
                </div>
                <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
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
                    <div class="bg-icon">
                        <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                    <ul>
                        <li>
                            <a href="{{ route('notification') }}"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                        </li>
                        <li>
                            <a href="{{ route('user_logout') }}"><i
                                    class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

