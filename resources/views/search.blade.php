<x-layout>
    <x-slot:title>{{ request('search') ? 'Searching for "' . request('search') . '" ' : 'Search ' }}-
        Writely</x-slot:title>
    <div class="card mb-3">
        <div class="card-body shadow">
            <form action="{{ route('search') }}" method="get">
                <div class="d-flex gap-2 position-relative">
                    <input type="text" name="search" id="searchInput" class="form-control"
                        placeholder="Finding some post or user?" value="{{ request('search') }}" autocomplete="off">

                    <!-- Tombol X -->
                    <button type="button" id="clearSearch" class="btn position-absolute"
                        style="right: 50px; top: 50%; transform: translateY(-50%); display: {{ request('search') ? 'block' : 'none' }};">
                        ✖
                    </button>

                    <button class="btn btn-primary"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>
        </div>
    </div>

    @if ($users->count() == 0 && $posts->count() == 0)
        <div align="center" class="mt-5">
            <i>No user or post found.</i>
        </div>
    @else
        <div x-data="{ activeTab: '', showTabs: false }">
            <!-- Card User -->
            @if ($users->count() > 0)
                <div x-show="!showTabs" class="card shadow">
                    <div class="card-header">
                        <h3>User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($users->take(3) as $user)
                                <div class="col-md-4">
                                    <x-cards.user :user="$user" />
                                </div>
                            @endforeach
                        </div>
                        @if ($users->count() > 3)
                            <div align="center">
                                <button class="btn btn-outline-info" style="border: none !important"
                                    @click="activeTab = 'user'; showTabs = true; window.scrollTo({top: 0, behavior: 'smooth'})">
                                    More users
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Card Post -->
            @if ($posts->count() > 0)
                <div x-show="!showTabs" class="card shadow">
                    <div class="card-header">
                        <h3 class="">Posts</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if ($posts->count() == 1)
                                @foreach ($posts->take(1) as $post)
                                    <div class="col-md-12">
                                        <x-cards.post-big :post="$post" />
                                    </div>
                                @endforeach
                            @elseif ($posts->count() > 1)
                                @foreach ($posts->take(3) as $post)
                                    <div class="col-md-4">
                                        <x-cards.post-mini :post="$post" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @if ($posts->count() > 3)
                            <div class="" align="center">
                                <div align="center">
                                    <button class="btn btn-outline-info" style="border: none !important"
                                        @click="activeTab = 'post'; showTabs = true; window.scrollTo({top: 0, behavior: 'smooth'})">
                                        More posts
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Tabs muncul setelah tombol ditekan -->
            <div x-show="showTabs" x-cloak class="mt-3">
                <div class="card shadow">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-fill gap-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link w-100" :class="activeTab === 'user' ? 'active' : ''"
                                    @click="activeTab = 'user'" data-bs-toggle="tab" data-bs-target="#userTab"
                                    role="tab">
                                    User
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link w-100" :class="activeTab === 'post' ? 'active' : ''"
                                    @click="activeTab = 'post'" data-bs-toggle="tab" data-bs-target="#postTab"
                                    role="tab">
                                    Posts
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content mt-3">
                    <!-- Tab User -->
                    <div class="tab-pane fade" :class="activeTab === 'user' ? 'show active' : ''" id="userTab"
                        role="tabpanel">
                        <div class="row">
                            @forelse ($users->take(6) as $user)
                                <div class="col-md-4">
                                    <x-cards.user :user="$user" />
                                </div>
                            @empty
                                <div align="center" class="mt-5">
                                    <i>No user found.</i>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Tab Posts -->
                    <div class="tab-pane fade" :class="activeTab === 'post' ? 'show active' : ''" id="postTab"
                        role="tabpanel">
                        <div class="row">
                            @forelse ($posts->take(9) as $post)
                                <div class="col-md-4">
                                    <x-cards.post-mini :post="$post" />
                                </div>
                            @empty
                                <div align="center" class="mt-5">
                                    <i>No post found.</i>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
</x-layout>
