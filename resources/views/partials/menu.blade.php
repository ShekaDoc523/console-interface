<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('ms_xbox_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.ms-xboxes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ms-xboxes") || request()->is("admin/ms-xboxes/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-xbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.msXbox.title') }}
                </a>
            </li>
        @endcan
        @can('ms_xboxdlc_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.ms-xboxesdlc.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ms-xboxesdlc") || request()->is("admin/ms-xboxesdlc/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-xbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.msXboxDlc.title') }}
                </a>
            </li>
        @endcan
        @can('xbox_now_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.xbox-now.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/xbox-now") || request()->is("admin/xbox-now/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-xbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.XboxNow.title') }}
                </a>
            </li>
        @endcan
        @can('xbox_now_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.xbox-now-dlc.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/xbox-now-dlc") || request()->is("admin/xbox-now-dlc/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-xbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.XboxNowDlc.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
