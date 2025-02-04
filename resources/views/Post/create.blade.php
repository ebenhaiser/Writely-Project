<x-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Create Post</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Category</label>
                        <select class="form-select" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
