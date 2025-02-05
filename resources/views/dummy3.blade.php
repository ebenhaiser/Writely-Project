<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor 5 in Laravel 11</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
</head>

<body>
    <style>
        .ckeditor img {
            max-height: 400px;
            min-height: 350px;
            width: auto;
            object-fit: contain;
        }
    </style>
    <h1>CKEditor 5 in Laravel 11</h1>
    <form method="POST" action="{{ route('ckeditor.create') }}">
        @csrf
        <div class="ckeditor">
            <textarea name="content" id="ckeditor"></textarea>
            <button type="submit">Submit</button>
        </div>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'), {
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
