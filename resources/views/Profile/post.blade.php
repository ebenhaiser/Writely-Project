<style>
    .card-post .card img {
        /* width: 100%; */
        height: 250px;
        object-fit: cover;
    }
</style>
<div class="row">
    @forelse ($posts as $post)
        <div class="card-post col-md-4">
            <div class="card shadow">
                <img src="{{ asset('img/postThumbnail/' . (file_exists(public_path('img/postThumbnail/' . $post->thumbnail)) ? $post->thumbnail : 'default.jpg')) }}"
                    class="card-img-top" alt="Thumbnail">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 badge text-bg-info" style="color: white">
                        {{ $post->category->name }}</h6>
                    <p class="card-text">
                        {{ Str::limit($post->content, 150, '...') }}
                    </p>
                    {{-- <a href="#" class="card-link">Card link</a> --}}
                    <div class="d-flex gap-2">
                        <span>
                            <i align="right">{{ $post->created_at->diffForHumans() }}</i>
                        </span>
                        <span>
                            &#8226;
                        </span>
                        <span>
                            <i><i class="bi bi-hand-thumbs-up"></i> <span
                                    class="like-count">{{ count($post->likes) }}</span></i>
                        </span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('post.show', $post->slug) }}" class="card-link">Read more &rarr;</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-12" align="center">
            <i>No post yet.</i>
        </div>
    @endforelse
</div>
