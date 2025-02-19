<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>


{{-- CKEditor --}}
{{-- <script>
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
</script> --}}

{{-- like toggle --}}
<script>
    $(document).ready(function() {
        $('.like-btn').on('click', function() {
            let button = $(this);
            let postId = button.data('post-id');

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
                    likeCountSpan.text(response.likes);
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        // Redirect ke halaman login jika belum login
                        window.location.href = "{{ route('login') }}";
                    }
                }
            });
        });
    });
</script>

{{-- follow toggle --}}
<script>
    $(document).ready(function() {
        $('.follow-btn').on('click', function() {
            let button = $(this);
            let userId = button.data('user-id'); // Ubah dari postId ke userId

            let followerCountSpan = button.closest('.card').find(
                '.follower-count'); // Perbaiki variabel

            $.ajax({
                url: "{{ route('follow.toggle') }}",
                method: "POST",
                data: {
                    user_id: userId, // Kirim user_id, bukan post_id
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Ubah teks tombol sesuai status follow/unfollow
                    button.find('.follow-text').text(response.status === 'followed' ?
                        'Unfollow' : 'Follow');

                    // Update jumlah follower
                    followerCountSpan.text(response.followers);
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        // Redirect ke halaman login jika belum login
                        window.location.href = "{{ route('login') }}";
                    }
                }
            });
        });
    });
</script>

{{-- search functionality --}}
<script>
    $(document).ready(function() {
        const $searchInput = $("#searchInput");
        const $clearSearch = $("#clearSearch");

        // Menampilkan tombol X jika ada teks di input
        $searchInput.on("input", function() {
            $clearSearch.css("display", $searchInput.val() ? "block" : "none");
        });

        // Klik tombol X untuk menghapus input dan submit form
        $clearSearch.on("click", function() {
            $searchInput.val("");
            $clearSearch.css("display", "none");
            $searchInput.closest("form").submit(); // Kirim form otomatis dengan search kosong
        });
    });
</script>

{{-- comment --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.10/dayjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.10/plugin/relativeTime.min.js"></script>
<script>
    dayjs.extend(dayjs_plugin_relativeTime);
</script>
