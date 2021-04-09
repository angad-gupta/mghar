@inject('menuRoles', '\App\Modules\User\Services\CheckUserRoles')
@php
$currentRoute = Request::route()->getName();
$Route = explode('.',$currentRoute);
@endphp

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md" @if($setting !=null))
    style="background-color: {{$setting->secondary_navbar_color}};" @endif>

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">General</div>
                    <i class="icon-menu" title="General"></i>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link @if($Route[0]=='dashboard') active @endif" data-popup="tooltip" data-original-title="Dashboard" data-placement="right"><i class="icon-home4"></i><span>Dashboard</span>
                    </a>
                </li>
                @if($menuRoles->assignedRoles('employment.index'))
                <li class="nav-item">
                    <a href="{{route('employment.index')}}" class="nav-link @if($Route[0]=='employment') active @endif" data-popup="tooltip" data-original-title="Employee Management" data-placement="right"><i class="icon-users4"></i><span>Employee Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('employee.list'))
                <li class="nav-item">
                    <a href="{{route('employee.list')}}" class="nav-link @if($Route[0]=='employee') active @endif" data-popup="tooltip" data-original-title="Employee Directory" data-placement="right"><i class="icon-address-book2"></i><span>Employee Directory</span>
                    </a>
                </li>
                @endif

                @if($menuRoles->assignedRoles('setting.create'))
                <li class="nav-item">
                    <a href="{{route('setting.create')}}" class="nav-link @if($Route[0]=='setting') active @endif" data-popup="tooltip" data-original-title="Setting Management" data-placement="right"><i class="icon-question7"></i><span>Setting Management</span>
                    </a>
                </li>
                @endif

                @if($menuRoles->assignedRoles('role.index') || Auth::user()->user_type == 'super_admin')
                <li class="nav-item">
                    <a href="{{route('role.index')}}" class="nav-link @if($Route[0]=='role') active @endif" data-popup="tooltip" data-original-title="Role Management" data-placement="right"><i class="icon-pencil5"></i><span>Role Management</span>
                    </a>
                </li>
                @endif


                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Entertainment Features</div>
                    <i class="icon-menu" title="Advance Construction Features"></i>
                </li>

                @if($menuRoles->assignedRoles('dynamicblock.index'))
                <li class="nav-item">
                    <a href="{{route('dynamicblock.index')}}" class="nav-link @if($Route[0]=='dynamicblock') active @endif" data-popup="tooltip" data-original-title="Dynamic Block Management" data-placement="right"><i class="icon-grid"></i><span>Dynamic Block Management</span>
                    </a>
                </li>
                @endif

                @if($menuRoles->assignedRoles('genre.index'))
                <li class="nav-item">
                    <a href="{{route('genre.index')}}" class="nav-link @if($Route[0]=='genre') active @endif" data-popup="tooltip" data-original-title="Genre Management" data-placement="right"><i class="icon-theater"></i><span>Genre Management</span>
                    </a>
                </li>
                @endif

                @if($menuRoles->assignedRoles('video.index'))
                <li class="nav-item">
                    <a href="{{route('video.index')}}" class="nav-link @if($Route[0]=='video') active @endif" data-popup="tooltip" data-original-title="Video Management" data-placement="right"><i class="icon-clapboard-play"></i><span>Video Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('celebrity.index'))
                <li class="nav-item">
                    <a href="{{route('celebrity.index')}}" class="nav-link @if($Route[0]=='celebrity') active @endif" data-popup="tooltip" data-original-title="Celebrity Management" data-placement="right"><i class="icon-chess-queen"></i><span>Celebrity Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('blog.index'))
                <li class="nav-item">
                    <a href="{{route('blog.index')}}" class="nav-link @if($Route[0]=='blog') active @endif" data-popup="tooltip" data-original-title="News Blog Management" data-placement="right"><i class="icon-media"></i><span>News Blog Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('khelaujuhari.index'))
                <li class="nav-item">
                    <a href="{{route('khelaujuhari.index')}}" class="nav-link @if($Route[0]=='khelaujuhari') active @endif" data-popup="tooltip" data-original-title="Khelau Juhari Management" data-placement="right"><i class="icon-shutter"></i><span>Khelau Juhari Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('banner.index'))
                <li class="nav-item">
                    <a href="{{route('banner.index')}}" class="nav-link @if($Route[0]=='banner') active @endif" data-popup="tooltip" data-original-title="Banner Management" data-placement="right"><i class="icon-images2"></i><span>Banner Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('ads.index'))
                <li class="nav-item">
                    <a href="{{route('ads.index')}}" class="nav-link @if($Route[0]=='ads') active @endif" data-popup="tooltip" data-original-title="Ads Management" data-placement="right"><i class="icon-images3"></i><span>Ads Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('faq.index'))
                <li class="nav-item">
                    <a href="{{route('faq.index')}}" class="nav-link @if($Route[0]=='faq') active @endif" data-popup="tooltip" data-original-title="FAQ Management" data-placement="right"><i class="icon-bubbles3"></i><span>FAQ Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('page.index'))
                <li class="nav-item">
                    <a href="{{route('page.index')}}" class="nav-link @if($Route[0]=='page') active @endif" data-popup="tooltip" data-original-title="Page Management" data-placement="right"><i class="icon-stack-text"></i><span>Page Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('subscription.index'))
                <li class="nav-item">
                    <a href="{{route('subscription.index')}}" class="nav-link @if($Route[0]=='subscription') active @endif" data-popup="tooltip" data-original-title="Subscription Management" data-placement="right"><i class="icon-stack-text"></i><span>Subscription Management</span>
                    </a>
                </li>
                @endif
                @if($menuRoles->assignedRoles('employee.list'))
                <li class="nav-item">
                    <a href="{{route('employee.list')}}" class="nav-link @if($Route[0]=='employee') active @endif"  data-popup="tooltip" data-original-title="Employee Directory" data-placement="right"><i class="icon-address-book2"></i><span>Employee Directory</span>
                    </a>
                </li>
                @endif

                @if($menuRoles->assignedRoles('search_log.index'))
                <li class="nav-item">
                    <a href="{{route('search_log.index')}}" class="nav-link @if($Route[0]=='search_log') active @endif" data-popup="tooltip" data-original-title="Search Logs" data-placement="right"><i class="icon-bubbles3"></i><span>Search Logs</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>