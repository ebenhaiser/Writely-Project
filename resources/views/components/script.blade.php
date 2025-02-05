<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'), {
            ckfinder: {
                uploadUrl: "{{ route('post.upload', ['_token' => csrf_token()]) }}"
            },
            toolbar: [
                'heading',
                'bold',
                'italic',
                'underline',
                'bulletedList',
                'numberedList',
                'imageUpload',
                'insertTable',
                'blockQuote',
                'mediaEmbed',
                'link',
            ],
            // plugins: [Image, ImageResizeEditing, ImageResizeHandles, /* ... */ ],
            placeholder: "Write your own article..."
        }).then(editor => {
            // Menetapkan minimal height menggunakan JS
            editor.ui.view.editable.element.style.minHeight = '300px';
        })
        .catch(error => {
            console.error(error);
        });
</script>
