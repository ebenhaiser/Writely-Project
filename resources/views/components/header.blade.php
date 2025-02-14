<header class="app-header shadow">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
        </ul>
        @if (Auth::check())
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span>
                                <img src="{{ asset('img/profilePicture/' . (Auth::user()->profile_picture && file_exists(public_path('img/profilePicture/' . Auth::user()->profile_picture)) ? Auth::user()->profile_picture : 'default.jpg')) }}"
                                    alt="" width="30" height="30" style="object-fit: cover"
                                    class="rounded-circle nav-icon-hover">
                            </span>
                            <span class="ms-2 fw-bold header-profile-name" style="font-size: 0.9rem">
                                {{ Auth::user()->username }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="{{ route('profile', ['username' => Auth::user()->username]) }}"
                                    class="d-flex align-items-center gap-3 dropdown-item">
                                    <i class="bi bi-person-circle"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                                <a href="{{ route('profile.edit', ['username' => Auth::user()->username]) }}"
                                    class="d-flex align-items-center gap-3 dropdown-item">
                                    <i class="bi bi-gear-wide-connected"></i>
                                    <p class="mb-0 fs-3">Edit Profile</p>
                                </a>
                                {{-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-mail fs-6"></i>
                                    <p class="mb-0 fs-3">My Account</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-list-check fs-6"></i>
                                    <p class="mb-0 fs-3">My Task</p>
                                </a> --}}
                                <a href="{{ route('logout') }}"
                                    class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        @else
            <div class="flex-row ms-auto me-3 align-items-center justify-content-end">
                <a href="{{ route('login') }}" class="btn btn-primary">Login
                </a>
            </div>
        @endif


    </nav>
</header>
