<x-layout>
    <style>
        .show-post .card img {
            border-radius: 20px
        }
    </style>
    <div class="container-fluid show-post">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h2>{{ $post->title }}</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    By <a href="{{ route('profile', $post->user->username) }}"
                                        class="link-primary">{{ $post->user->name }}
                                        (&#64;{{ $post->user->username }})</a>
                                    in {{ $post->category->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" align="right">
                        @if (Auth::user()->id == $post->user_id)
                            <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-outline-primary">Edit</a>
                        @else
                            <button class="btn btn-primary">Like</button>
                        @endif
                    </div>
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
