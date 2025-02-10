<x-layout>
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('search') }}" method="get">
                <div class="d-flex gap-2 position-relative">
                    <input type="text" name="search" id="searchInput" class="form-control"
                        placeholder="Finding some post or user?" value="{{ request('search') }}">

                    <!-- Tombol X -->
                    <button type="button" id="clearSearch" class="btn position-absolute"
                        style="right: 50px; top: 50%; transform: translateY(-50%); display: {{ request('search') ? 'block' : 'none' }};">
                        ✖
                    </button>

                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    @if ($users->count() > 0)
        <div class="card">
            <div class="card-header">
                <h3>User</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($users->take(2) as $user)
                        <div class="col-md-6">
                            <x-cards.user :user="$user" />
                        </div>
                    @endforeach
                </div>
                @if ($users->count() > 2)
                    <div class="" align="center">
                        <a href="" class="link-primary">more user</a>
                    </div>
                @endif
            </div>
        </div>
    @endif
    @if ($posts->count() > 0)
        <div class="card">
            <div class="card-header">
                <h3 class="">Posts:</h3>
            </div>
            <div class="card-body">
                @foreach ($posts->take(3) as $post)
                    <x-cards.post-big :post="$post" />
                @endforeach
                @if ($posts->count() > 3)
                    <div class="" align="center">
                        <a href="" class="link-primary">more post</a>
                    </div>
                @endif
            </div>
        </div>
    @endif


</x-layout>
