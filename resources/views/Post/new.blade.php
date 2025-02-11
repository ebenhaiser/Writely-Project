<x-layout>
    <x-slot:title>{{ request()->routeIs('post.edit') ? $post->title . ' (Edit) ' : 'New Post ' }}-
        Writely</x-slot:title>

    <style>
        .ckeditor-container img {
            max-height: 400px;
            /* min-height: 350px; */
            width: auto;
            object-fit: contain;
        }

        .ckeditor-container textarea {
            min-height: 2000px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3>Create Post</h3>
        </div>
        <div class="card-body">
            <form
                action="{{ request()->routeIs('post.edit') ? route('post.update', $post->slug) : route('post.create') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title"
                        value="{{ request()->routeIs('post.edit') ? $post->title : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control">
                </div>
                @if (request()->routeIs('post.edit'))
                    <div class="mb-3">
                        <img src="{{ asset('img/postThumbnail/' . $post->thumbnail) }}" class="w-100" alt=""
                            style="border-radius: 20px">
                    </div>
                    <div class="mb-3">
                        <div id="thumbnail-preview"></div>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="" class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="20">{{ request()->routeIs('post.edit') ? $post->content : '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Category</label>
                    <select class="form-select" name="category_id" required>
                        <option value="">-- Choose the category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request()->routeIs('post.edit') && $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div align="right">
                    <button class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>

    {{-- delete post --}}
    @if (request()->routeIs('post.edit'))
        <style>
            .card-delete-post .card {
                border: solid 1px red;
            }

            .card-delete-post .card .card-header {
                background-color: #f8d7da;
                border-bottom: solid 1px red;
            }
        </style>
        <div class="card-delete-post">
            <div class="card">
                <div class="card-header">
                    <div class="h3">Danger Zone</div>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{ route('post.delete', $post->slug) }}" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                            Delete Post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-layout>
