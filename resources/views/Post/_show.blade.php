<x-layout>
    <style>
        .show-post .card img {
            border-radius: 20px
        }

        .profile img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    <div class="show-post">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span class="">
                        <h2 class="">{{ $post->title }}</h2>
                        <h6 class="badge text-bg-info" style="color: white">
                            {{ $post->category->name }}</h6>
                        <a href="{{ route('profile', $post->user->username) }}" class="d-flex">
                            <span>
                                <div
                                    class="profile me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
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
                    </span>
                    <span class="" align="right">
                        <button class="btn btn-outline-primary mb-1">
                            <i class="bi bi-hand-thumbs-up"></i>
                        </button>
                        @if (Auth::check() && Auth::user()->id == $post->user_id)
                            <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-outline-primary">Edit</a>
                        @endif
                    </span>
                </div>
            </div>
            <div class="card-body">
                @if ($post->thumbnail && file_exists(public_path('img/postThumbnail/' . $post->thumbnail)))
                    <img src="{{ asset('img/postThumbnail/' . $post->thumbnail) }}" class="w-100 mb-4" alt="...">
                @endif
                <div class="ckeditor-container">{!! str_replace("\n", '<br>', e($post->content)) !!}
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6" align="center">
                        <p>Likes: {{ count($post->likes) }}</p>
                    </div>
                    <div class="col-sm-6" align="center">
                        <p>Created at: {{ $post->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
