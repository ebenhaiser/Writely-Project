<x-layout>
    @if ($users)
        <h3 class="mb-3">Users:</h3>
        @foreach ($users as $user)
            <div class="card">
                <p>{{ $user->name }}</p>
            </div>
        @endforeach
    @endif
    @if ($posts)
        <h3 class="mb-3">posts:</h3>
        @foreach ($posts as $post)
            <div class="card">
                <p>{{ $post->title }}</p>
            </div>
        @endforeach
    @endif


</x-layout>
