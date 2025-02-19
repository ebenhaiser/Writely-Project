<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor 5 in Laravel 11</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
</head>

<body>
    <h1>CKEditor 5 in Laravel 11</h1>
    <form method="POST" action="{{ route('ckeditor.create') }}">
        @csrf
        <textarea name="content" id="editor"></textarea>
        <button type="submit">Submit</button>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                },
                // plugins: [Image, ImageResizeEditing, ImageResizeHandles, /* ... */ ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
