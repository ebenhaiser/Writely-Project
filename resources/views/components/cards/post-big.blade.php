<div class="card-post-big">
    <div class="card shadow">
        <div class="card-body row">
            <div class="col-md-6">
                <img src="{{ asset('img/postThumbnail/' . (file_exists(public_path('img/postThumbnail/' . $post->thumbnail)) && $post->thumbnail ? $post->thumbnail : 'default.jpg')) }}"
                    class="card-img-top" alt="Thumbnail" style="object-fit: cover; height:220px; border-radius: 10px">
            </div>
            <div class="col-md-6">
                <div class="row mb-2 mt-2">
                    <div class="col-sm-8">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <div class="col-sm-4" align="right">
                        <h6 class="badge text-bg-info" style="color: white">
                            {{ $post->category->name }}</h6>
                    </div>
                </div>
                <p class="card-text">
                    {{ Str::limit($post->content, 250, '...') }}
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
                        <i class='bx bx-like'></i> <span class="like-count">{{ count($post->likes) }}</span>
                    </span>
                    <span>
                        <i class='bx bx-comment'></i> <span class="like-count">{{ count($post->comments) }}</span>
                    </span>
                </div>
                <button class="btn btn-outline-primary mt-2 like-btn" data-post-id="{{ $post->id }}">
                    <span class="like-text mt-0">{{ $post->isLikedByUser() ? 'Unlike' : 'Like' }}</span>
                </button>
            </div>
        </div>
        <div class="card-footer row">
            <div class="col-sm-10">
                <a href="{{ route('profile', $post->user->username) }}" class="d-flex">
                    <span>
                        <div class="profile me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                            <img src="{{ asset('img/profilePicture/' . ($post->user->profile_picture && file_exists(public_path('img/profilePicture/' . $post->user->profile_picture)) ? $post->user->profile_picture : 'default.jpg')) }}"
                                alt="" class="rounded-circle border border-4 border-white-color-40">
                        </div>
                    </span>
                    <span class="my-auto ms-1">
                        <h5 class="mt-0 mb-0">{{ $post->user->name }}</h5>
                        <p class="mb-0 mt-0 text-body" style="text-decoration: none">
                            {{ '@' . $post->user->username }}</p>
                    </span>
                </a>
            </div>
            <div class="col-sm-2 my-auto" align="right">
                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-secondary">Read more
                    &rarr;</a>
            </div>
        </div>
    </div>
</div>
