<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('admin.dashboard') }}">
                @if(getSetting('app_logo'))
                    <img src="{{ asset(getSetting('app_logo')) }}" width="110" height="32" alt="{{ getSetting('app_name') }}" class="navbar-brand-image">
                @else
                    {{ getSetting('app_name', 'Admin') }}
                @endif
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">

            <div class="d-none d-lg-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                   data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                   data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>

            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-secondary">Admin</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">{{ __('Profile') }}</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:;" onclick="event.preventDefault(); this.closest('form').submit();"
                           class="dropdown-item">{{ __('Logout') }}</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                @can('dashboard-view')
                <li class="nav-item">
                    <a class="nav-link "
                       href="{{ route('admin.dashboard') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <i class="ti ti-home sidebar-icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Home
                        </span>
                    </a>
                </li>
                @endcan
                @can('user-list')
                <li class="nav-item">
                    <a class="nav-link "
                       href="{{ route('admin.users.index') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-users sidebar-icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Users
                        </span>
                    </a>
                </li>
                @endcan
                @can('designation-list')
                <li class="nav-item">
                    <a class="nav-link "
                       href="{{ route('admin.designation.index') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-briefcase sidebar-icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Designation
                        </span>
                    </a>
                </li>
                @endcan
                
                @can('partner-list')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle }}"
                       href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                       aria-expanded="true">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                <i class="ti ti-list sidebar-icon"></i>
                            </span>
                        <span class="nav-link-title">
                                {{ __('Partner') }}
                            </span>
                    </a>
                    <div
                        class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item"
                                   href="{{route('admin.partner.index')}}">
                                    {{ __('Partner') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @endcan

                @can('post-list')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                       aria-expanded="true">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-news sidebar-icon"></i>
                            </span>
                        <span class="nav-link-title">
                                {{ __('Post Management') }}
                            </span>
                    </a>
                    <div
                        class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item"
                                   href="{{route('admin.posts.index')}}">
                                    {{ __('All Posts') }}
                                </a>
                                @can('post-create')
                                <a class="dropdown-item"
                                   href="{{route('admin.posts.create')}}">
                                    {{ __('Create Post') }}
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </li>
                @endcan

                @can('post-category-list')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle }}"
                       href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                       aria-expanded="true">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-settings sidebar-icon"></i>
                            </span>
                        <span class="nav-link-title">
                                {{ __('Post Category') }}
                            </span>
                    </a>
                    <div
                        class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item"
                                   href="{{route('admin.post.category.index')}}">
                                    {{ __('Post Category') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @endcan

                @can('role-list')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-role" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-shield sidebar-icon"></i>
                        </span>
                        <span class="nav-link-title">Access Control</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{ route('admin.roles.index') }}">
                                    Roles
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.roles.assign.index') }}">
                                    Assign Role
                                </a>
                                @can('permission-list')
                                <a class="dropdown-item" href="{{ route('admin.permissions.index') }}">
                                    Permissions
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </li>
                @endcan

                @can('setting-manage')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.settings.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-settings sidebar-icon"></i>
                        </span>
                        <span class="nav-link-title">Global Settings</span>
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</aside>

<!-- Navbar -->
<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row order-md-last ">
            <div class="d-none d-md-flex me-4">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark " data-bs-toggle="tooltip"
                   data-bs-placement="bottom" aria-label="Enable dark mode"
                   data-bs-original-title="Enable dark mode">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip"
                   data-bs-placement="bottom" aria-label="Enable light mode"
                   data-bs-original-title="Enable light mode">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7">
                        </path>
                    </svg>
                </a>

            </div>
            <div class="nav-item dropdown">
                <a href="javascript:;" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu" aria-expanded="false">
                    <span class="avatar avatar-sm" style="background-image: url({{ asset(auth()->user()->avatar ?? 'frontend/assets/images/user/1.jpg') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-secondary">{{ auth()->user()->email }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">{{ __('Profile') }}</a>
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item">{{ __('Settings') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:;" onclick="event.preventDefault(); this.closest('form').submit();"
                           class="dropdown-item">{{ __('Logout') }}</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">

        </div>
    </div>
</header>
