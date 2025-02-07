<style>
    .card-post .card img {
        /* width: 100%; */
        height: 250px;
        object-fit: cover;
    }
</style>

@forelse ($posts as $post)
    <div class="card-post col-md-4">
        <div class="card shadow">
            <img src="{{ asset('img/postThumbnail/' . (file_exists(public_path('img/postThumbnail/' . $post->thumbnail)) ? $post->thumbnail : 'default.jpg')) }}"
                class="card-img-top" alt="Thumbnail">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                <p class="card-text">
                    {{ Str::limit($post->content, 150, '...') }}
                </p>
                {{-- <a href="#" class="card-link">Card link</a> --}}
            </div>
            <div class="card-footer">
                <a href="{{ route('post.show', $post->slug) }}" class="card-link">Read more</a>
            </div>
        </div>
    @empty
        <div class="col-md-12" align="center">
            <i>No post yet.</i>
        </div>
@endforelse
