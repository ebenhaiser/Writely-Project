<x-layout>
    <style>
        .ckeditor-container img {
            max-height: 380px;
            min-height: 330px;
            width: auto;
            object-fit: contain;
            display: block;
            /* Menjadikan gambar sebagai blok elemen */
            margin-left: auto;
            /* Margin kiri otomatis */
            margin-right: auto;
            /* Margin kanan otomatis */
        }

        .ckeditor-container textarea {
            min-height: 2000px;
        }
    </style>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="card-body">
                <div class="ckeditor-container">{!! $post->content !!}</div>
            </div>
            <div class="card-footer">
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
