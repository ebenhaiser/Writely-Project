<div class="card-post-mini link-dark">
    <div class="card shadow">
        <a href="{{ route('post.show', $post->slug) }}" style="color: inherit; text-decoration: none;">
            <img src="{{ asset('img/postThumbnail/' . (file_exists(public_path('img/postThumbnail/' . $post->thumbnail)) && $post->thumbnail ? $post->thumbnail : 'default.jpg')) }}"
                class="card-img-top" alt="Thumbnail">
            <div class="card-body">
                <h5 class="card-title title-limit">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 badge text-bg-info" style="color: white">
                    {{ $post->category->name }}</h6>
                <p class="card-text content-limit">
                    {{ $post->content }}
                </p>
                {{-- <a href="#" class="card-link">Card link</a> --}}
                <div class="d-flex gap-2" style="color: gray">
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
            </div>
        </a>
        <div class="card-footer">
            <a href="{{ route('profile', $post->user->username) }}" class="d-flex">
                <span>
                    <div class="post-profile me-2">
                        <img src="{{ asset('img/profilePicture/' . ($post->user->profile_picture && file_exists(public_path('img/profilePicture/' . $post->user->profile_picture)) ? $post->user->profile_picture : 'default.jpg')) }}"
                            alt="" class="rounded-circle border border-4 border-white-color-40">
                    </div>
                </span>
                <span class="my-auto">
                    <h6 class="mt-0 mb-0">{{ $post->user->name }}</h6>
                    <p class="mb-0 mt-0 text-body" style="text-decoration: none">
                        {{ '@' . $post->user->username }}</p>
                </span>
            </a>
        </div>
    </div>
</div>
