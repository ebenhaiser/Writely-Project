<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 Sample</title>
    <link rel="stylesheet" href="{{ asset('CKEditor/slyle.css') }}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" crossorigin>
</head>

<body>
    <div class="card">
        <div class="card-body">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        {!! $post->content !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js" crossorigin></script>
    <script src="{{ asset('CKEditor/main.js') }}"></script>
</body>

</html>
