<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- CKEditor --}}
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

{{-- like toggle --}}
<script>
    $(document).ready(function() {
        $('.like-btn').on('click', function() {
            let button = $(this);
            let postId = button.data('post-id');

            // Temukan elemen .like-count dalam .card-footer
            let likeCountSpan = button.closest('.card').find('.like-count');

            $.ajax({
                url: "{{ route('like.toggle') }}",
                method: "POST",
                data: {
                    post_id: postId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    button.find('.like-text').text(response.status === 'liked' ? 'Unlike' :
                        'Like');

                    // Update angka like count dengan nilai terbaru dari server
                    likeCountSpan.text(response.likes);
                }
            });
        });
    });
</script>
