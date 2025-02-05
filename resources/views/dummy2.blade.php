<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor 5 with Image Resize in Laravel 11</title>
    <script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
</head>

<body>
    <h1>CKEditor 5 with Image Resize</h1>
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
                toolbar: [
                    'heading', '|', 'bold', 'italic', '|',
                    'imageUpload', 'imageResize', '|',
                    'blockQuote', 'undo', 'redo'
                ],
                image: {
                    resizeUnit: 'px',
                    toolbar: [
                        'imageStyle:full',
                        'imageStyle:side',
                        '|',
                        'imageResize'
                    ],
                    resizeOptions: [{
                            name: 'resizeImage:original',
                            label: 'Original',
                            value: null
                        },
                        {
                            name: 'resizeImage:50',
                            label: '50%',
                            value: '50'
                        },
                        {
                            name: 'resizeImage:75',
                            label: '75%',
                            value: '75'
                        }
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
