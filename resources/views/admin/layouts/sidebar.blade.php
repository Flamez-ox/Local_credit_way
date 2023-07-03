<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::is('admin/show-users/*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('show_users') }}"><i class="fas fa-hand-point-right"></i> <span>Users</span></a></li>
            <li class="{{ Request::is('admin/local-transactions/*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('local_transactions') }}"><i class="fas fa-hand-point-right"></i> <span>Local Transations</span></a></li>
            <li class="{{ Request::is('admin/wire-transactions/*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('wire_transactions') }}"><i class="fas fa-hand-point-right"></i> <span>Wire Transations</span></a></li>
            <li class="{{ Request::is('admin/pins/*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('pins') }}"><i class="fas fa-hand-point-right"></i> <span>View Pins</span></a></li>
            <li class="{{ Request::is('admin/support/*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('support') }}"><i class="fas fa-hand-point-right"></i> <span>Complaints</span></a></li>

            {{-- <li class="nav-item dropdown {{ Request::is('admin/top-advertisement-*') || Request::is('admin/home-advertisement-*') || Request::is('admin/sidebar-advertisement-*') ? 'active' : ''}} ">
                <a href="" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-advertisement-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_top_advertisement') }}"></i>Top Advertisements</a></li>
                    <li class="{{ Request::is('admin/home-advertisement-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_home_advertisement') }}"></i>Home Advertisements</a></li>
                    <li class="{{ Request::is('admin/sidebar-advertisement-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_sidebar_advertisement') }}"></i>Sidebar Advertisements</a></li>
                </ul>
            </li> --}}
            
            {{-- <li class="nav-item dropdown {{ Request::is('admin/category-*') || Request::is('admin/sub-category-*') || Request::is('admin/post-*')  ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_catergory_show') }}"></i>Catergories</a></li>
                    <li class="{{ Request::is('admin/sub-category-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_sub_catergory_show') }}"></i>Sub-catergories</a></li>
                    <li class="{{ Request::is('admin/post-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_post_show') }}"></i>Posts</a></li>
                </ul>
            </li> --}}
            {{-- <li class="{{ Request::is('admin/settings-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_setting') }}"><i class="fas fa-hand-point-right"></i> <span>Settings</span></a></li>

            <li class="{{ Request::is('admin/photo-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_photo') }}"><i class="fas fa-hand-point-right"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ Request::is('admin/video-*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin_video') }}"><i class="fas fa-hand-point-right"></i> <span>Video Gallery</span></a></li>

            <li class="{{ Request::is('admin/pages-status/*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('status_view') }}"><i class="fas fa-hand-point-right"></i> <span>Pages Status</span></a></li>

            <li class="{{ Request::is('admin/contact-show/*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('contact_show') }}"><i class="fas fa-hand-point-right"></i> <span>Contact</span></a></li> --}}

             {{-- <liclass=""><aclass="nav-link"href="form.html"><iclass="fasfa-hand-point-right"></i><span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li> --}}

        </ul>
    </aside>
</div>
