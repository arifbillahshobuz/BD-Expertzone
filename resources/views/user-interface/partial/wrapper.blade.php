



<aside class="sidebar sidebar-default sidebar-base navs-rounded-all " style="margin: 7.3rem 0;" id="first-tour" data-toggle="main-sidebar"
    data-sidebar="responsive">   
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Main</span>
                        <span class="mini-icon" data-bs-toggle="tooltip" title="Social"
                            data-bs-placement="right">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                        <i class="icon material-symbols-outlined">
                            newspaper
                        </i>
                        <span class="item-name">Newsfeed</span>
                    </a>
                </li>
                @auth()
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.profile')}}" role="button">
                        <i class="icon material-symbols-outlined">
                            person
                        </i>
                        <span class="item-name">Profiles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('friends.list') ? 'active' : '' }}" href="{{ route('friends.list') }}">
                        <i class="icon material-symbols-outlined">
                            people
                        </i>
                        <span class="item-name">Friend List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('friend.requests') ? 'active' : '' }}" href="{{ route('friend.requests') }}">
                        <i class="icon material-symbols-outlined">
                            person_add
                        </i>
                        <span class="item-name">Friend Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('friends.relative') ? 'active' : '' }}" href="{{ route('friends.relative') }}">
                        <i class="icon material-symbols-outlined">
                            diversity_3
                        </i>
                        <span class="item-name">Relative Friend List</span>
                    </a>
                </li>

                {{-- Dynamic Sidebar Content (Page specific) --}}
                @yield('sidebar_extra')
                @endauth
            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
