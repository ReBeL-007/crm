<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.users.index") }}"
                    class="nav-link {{ request()->is('admins/users') || request()->is('admins/users/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>
                    {{ trans('cruds.user.title') }}
                </a>
            </li>


            <li class="nav-item nav-dropdown {{ request()->is('crm/companies/*') || request()->is('crm/employees/*') ? 'open' : '' }}">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    CRM
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("crm.companies.index") }}"
                            class="nav-link {{ request()->is('crm/companies') || request()->is('crm/companies/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('cruds.company.title') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("crm.employees.index") }}"
                            class="nav-link {{ request()->is('crm/employees') || request()->is('crm/employees/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('cruds.employee.title') }}
                        </a>
                    </li>
                </ul>
            </li>

            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))

            <li class="nav-item">
                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                    href="{{ route('profile.password.edit') }}">
                    <i class="fa-fw fas fa-key nav-icon">
                    </i>
                    {{ trans('global.change_password') }}
                </a>
            </li>

            @endif
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
