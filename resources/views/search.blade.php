<x-layout>
    <div class="card mb-3">
        <div class="card-body d-flex gap-3">
            <input type="text" class="form-control" placeholder="Have a question? Ask Now">
            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
    </div>
    @if ($users)
        <h3 class="mb-3">Users:</h3>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-6">
                    <x-cards.user :user="$user" />
                </div>
            @endforeach
        </div>
    @endif
    @if ($posts)
        <h3 class="mb-3">Posts:</h3>
        @foreach ($posts as $post)
            <div class="card">
                <p>{{ $post->title }}</p>
            </div>
        @endforeach
    @endif


</x-layout>
