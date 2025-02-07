<x-layout>
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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Create Post</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="20"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Category</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">-- Choose the category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div align="right">
                        <button class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
