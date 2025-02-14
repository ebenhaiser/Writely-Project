<x-layout>
    <x-slot:title>Explore - Writely</x-slot:title>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('explore') }}" method="get">
                <div class="d-flex gap-2">
                    <select name="category" id="" class="form-control">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}"
                                {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary">Find</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4">
                <x-cards.post-mini :post="$post" />
            </div>
        @empty
            <div class="col-md-12" align="center">
                <i>No post yet.</i>
            </div>
        @endforelse
    </div>
</x-layout>
