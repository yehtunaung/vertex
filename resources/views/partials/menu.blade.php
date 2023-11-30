<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text text-warning fw-bold ms-2">vERTEX</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div> {{ trans('global.dashboard') }}</div>
            </a>
        </li>

        {{-- user management --}}
        @can('user_management_access')
            <li
                class="menu-item  {{ request()->is('admin/permissions*') ? 'active open' : '' }} {{ request()->is('admin/roles*') ? 'active open' : '' }} {{ request()->is('admin/users*') ? 'active open' : '' }} {{ request()->is('admin/audit-logs*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Dashboards">User management</div>
                </a>
                <ul class="menu-sub">
                    @can('permission_access')
                        <li
                            class="menu-item  {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                                <div data-i18n="Analytics"> {{ trans('cruds.permission.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li
                            class="menu-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                <div data-i18n="eCommerce"> {{ trans('cruds.role.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li
                            class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li
                            class="menu-item {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.audit-logs.index') }}" class="menu-link">
                                <div data-i18n="eCommerce"> {{ trans('cruds.auditLog.title') }}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        {{-- user alert --}}
        @can('user_alert_access')
            <li
                class="menu-item  {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                <a href="{{ route('admin.user-alerts.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-bell"></i>
                    <div> {{ trans('cruds.userAlert.title') }}</div>
                </a>
            </li>
        @endcan

        @can('facality_type_access')
            <li
                class="menu-item  {{ request()->is('admin/facality-type') || request()->is('admin/facality-type/*') ? 'active' : '' }}">
                <a href="{{ route('admin.facality-type.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons  bx bx-cookie"></i>
                    <div> Facality Type</div>
                </a>
            </li>
        @endcan

        @can('facality_access')
            <li
                class="menu-item  {{ request()->is('admin/facality') || request()->is('admin/facality/*') ? 'active' : '' }}">
                <a href="{{ route('admin.facality.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons  bx bx-blanket"></i>
                    <div> Facality</div>
                </a>
            </li>
        @endcan

        @can('room_category_access')
            <li
                class="menu-item  {{ request()->is('admin/roomCategory') || request()->is('admin/roomCategory/*') ? 'active' : '' }}">
                <a href="{{ route('admin.roomCategory.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons  bx bx-category"></i>
                    <div>{{ trans("cruds.room_category.title") }}</div>
                </a>
            </li>
        @endcan

        @can('room_category_access')
            <li
                class="menu-item  {{ request()->is('admin/room') || request()->is('admin/room/*') ? 'active' : '' }}">
                <a href="{{ route('admin.room.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons  bx bx-bed"></i>
                    <div>{{ trans("cruds.room.title")  }}</div>
                </a>
            </li>
        @endcan


        {{-- profile password --}}
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li
                    class="menu-item  {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                    <a href="{{ route('profile.password.edit') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-key"></i>
                        <div> {{ trans('global.change_password') }}</div>
                    </a>
                </li>
            @endcan
        @endif

        {{-- logout --}}
        <li class="menu-item d-none">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-key"></i>
                <div> {{ trans('global.logout') }}</div>
            </a>
        </li>

    </ul>
</aside>
