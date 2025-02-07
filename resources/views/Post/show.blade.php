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
                    </div>
                    <div class="col-md-2" align="right">
                        @if (Auth::user()->id == $post->user_id)
                            <button class="btn btn-outline-primary">Edit</button>
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
                <p align="center">Likes </p>
                <div class="row">
                    <div class="col-sm-6" align="center">
                        <p>By <a href="{{ route('profile', $post->user->username) }}"
                                class="link-primary">{{ $post->user->name }}</a></p>
                    </div>
                    <div class="col-sm-6" align="center">
                        Category : {{ $post->category->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
