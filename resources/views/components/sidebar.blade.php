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
            <a href="{{ route('home') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                        <span class="sidebar-icon">
                            <i class="bi bi-house"></i>
                        </span>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Sidebar footer with "Write" link at the bottom -->
    @if (Auth::check())
        <div class="sidebar-footer mt-auto p-3">
            <a class="btn btn-info w-100 mb-2" href="{{ route('create.post') }}">
                <i class="bi bi-pencil me-2"></i> Write
            </a>
            <a class="btn btn-primary w-100" href="{{ route('profile', Auth::user()->username) }}">
                <i class="bi bi-person-circle me-2"></i> Profile
            </a>
        </div>
    @else
        <div class="sidebar-footer mt-auto p-3">
            <a class="btn btn-primary w-100 mb-2" href="{{ route('login') }}">
                <i class="bi bi-pencil me-2"></i> Login
            </a>
        </div>
    @endif
</aside>
