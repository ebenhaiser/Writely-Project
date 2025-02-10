<style>
    .sidebar-icon {
        font-size: 20px;
        font-weight: 700;
    }

    .sidebar-link .hide-menu {
        font-size: 18 px;
        font-weight: 700px
    }

    .sidebar-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>

<aside class="left-sidebar d-flex flex-column" style="height: 100vh;">
    <!-- Sidebar scroll-->
    <div class="flex-grow-1">
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="text-nowrap logo-img d-flex gap-2">
                <img src="{{ asset('assets/images/logos/writely-logo.png') }}" height="50" alt="" />
                <span class="my-auto">
                    <h1 style="font-weight: 100; font-family: 'Monomaniac One', serif; font-style: normal;"
                        class="text-dark-emphasis">
                        Writely</h1>
                </span>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item {{ request()->routeIs('home') ? 'selected' : '' }}">
                    <a class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"
                        aria-expanded="false">
                        <span class="sidebar-icon">
                            <i class="bi bi-house"></i>
                        </span>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('/search') ? 'selected' : '' }}">
                    <a class="sidebar-link {{ request()->routeIs('/search') ? 'active' : '' }}"
                        href="{{ route('search') }}" aria-expanded="false">
                        <span class="sidebar-icon">
                            <i class="bi bi-search"></i>
                        </span>
                        <span class="hide-menu">Search</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Sidebar footer with "Write" link at the bottom -->
    @if (Auth::check())
        <div class="sidebar-footer mt-auto p-3">
            <a class="btn btn-info w-100 mb-2 d-flex gap-2 justify-content-center" href="{{ route('post.new') }}">
                <i class="bi bi-pencil"></i>Write
            </a>
            <a class="btn btn-primary w-100 d-flex gap-2 justify-content-center"
                href="{{ route('profile', Auth::user()->username) }}">
                <i class="bi bi-person-circle"></i>Profile
            </a>
        </div>
    @else
        <div class="sidebar-footer mt-auto p-3">
            <a class="btn btn-primary w-100 mb-2 d-flex gap-2 justify-content-center" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right"></i>Login
            </a>
        </div>
    @endif
</aside>
