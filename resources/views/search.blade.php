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
        <h3 class="mb-3">Users:</h3>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-6">
                    <x-cards.user :user="$user" />
                </div>
            @endforeach
        </div>
    @endif
    @if ($posts->count() > 0)
        <h3 class="mb-3">Posts:</h3>
        @foreach ($posts as $post)
            <x-cards.post-big :post="$post" />
        @endforeach
    @endif


</x-layout>
