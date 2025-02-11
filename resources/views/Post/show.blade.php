<x-layout>
    <x-slot:title>{{ $post->title . ' - Writely' }}</x-slot:title>
    <style>
        .show-post .card img {
            border-radius: 20px
        }

        .profile img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    <div class="show-post">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span class="">
                        <h2 class="">{{ $post->title }}</h2>
                        <h6 class="badge text-bg-info" style="color: white">
                            {{ $post->category->name }}</h6>
                        <a href="{{ route('profile', $post->user->username) }}" class="d-flex">
                            <span>
                                <div
                                    class="profile me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                    <img src="{{ asset('img/profilePicture/' . ($post->user->profile_picture && file_exists(public_path('img/profilePicture/' . $post->user->profile_picture)) ? $post->user->profile_picture : 'default.jpg')) }}"
                                        alt="" class="rounded-circle border border-4 border-white-color-40">
                                </div>
                            </span>
                            <span class="my-auto ms-1">
                                <h5 class="mt-0 mb-0">{{ $post->user->name }}</h5>
                                <p class="mb-0 mt-0 text-body" style="text-decoration: none">
                                    {{ '@' . $post->user->username }}</p>
                            </span>
                        </a>
                    </span>
                    <span class="" align="right">
                        <button class="btn btn-outline-primary mb-1 like-btn" data-post-id="{{ $post->id }}">
                            <span class="like-text">{{ $post->isLikedByUser() ? 'Unlike' : 'Like' }}</span>
                        </button>
                        @if (Auth::check() && Auth::user()->id == $post->user_id)
                            <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-outline-primary">Edit</a>
                        @endif
                        <p class="bi bi-hand-thumbs-up mt-3"> <span
                                class="like-count">{{ $post->likes->count() }}</span>
                        </p>
                    </span>
                </div>
            </div>
            <div class="card-body">
                @if ($post->thumbnail && file_exists(public_path('img/postThumbnail/' . $post->thumbnail)))
                    <img src="{{ asset('img/postThumbnail/' . $post->thumbnail) }}" class="w-100 mb-4" alt="...">
                @endif
                <div class="ckeditor-container">{!! str_replace("\n", '<br>', e($post->content)) !!}
                </div>
            </div>
            <div class="card-footer" align="center">
                <p>Created at: {{ $post->created_at->format('d F Y') }}</p>
            </div>
        </div>
    </div>


    {{-- comment --}}
    <!-- Input Komentar -->
    <div class="card comments-section mt-4">
        <h4 class="card-header">Comments</h4>
        <div class="card-body">
            <div id="comments-list" class="mb-3"></div>

            @auth
                <div class="d-flex gap-2">
                    <input id="comment-content" class="form-control" placeholder="Write a comment..." />
                    <button id="post-comment" class="btn btn-primary">Post</button>
                </div>
            @endauth
        </div>
    </div>

    <!-- Load jQuery jika belum -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let postId = {{ $post->id }};

            // Fungsi Load Komentar
            function loadComments() {
                $.ajax({
                    url: "{{ route('comments.index', $post->id) }}",
                    method: "GET",
                    success: function(response) {
                        let commentsHtml = "";
                        response.forEach(comment => {
                            let canDelete = "{{ Auth::check() }}" &&
                                (comment.user_id == "{{ Auth::id() }}" ||
                                    "{{ Auth::id() }}" == "{{ $post->user_id }}");

                            // Cek apakah profile_picture ada, jika tidak gunakan 'default.jpg'
                            let profilePicture = comment.user.profile_picture ?
                                `/img/profilePicture/${comment.user.profile_picture}` :
                                `/img/profilePicture/default.jpg`;

                            commentsHtml += `
                <div class="comment mb-3" data-id="${comment.id}">
                    <a href="{{ route('profile', '') }}/${comment.user.username}" style="color: inherit; text-decoration: none;">
                        <img src="${profilePicture}"
                            alt=""
                            class="rounded-circle border border-4 border-white-color-40"
                            width="35" height="35"
                            style="object-fit: cover;">
                        <b>${comment.user.name}</b>
                    </a>
                    <p class="mt-1">${comment.content}</p>
                    <small>${dayjs(comment.created_at).fromNow()}</small>
                    <button class="btn btn-sm btn-outline-primary ms-1 reply-btn">Reply</button>
                    ${canDelete ? `<button class="btn btn-sm btn-outline-danger ms-1 delete-comment">Delete</button>` : ""}
                    <div class="replies"></div>
                </div>
                `;

                            if (comment.replies.length > 0) {
                                comment.replies.forEach(reply => {
                                    let canDeleteReply = "{{ Auth::check() }}" &&
                                        (reply.user_id == "{{ Auth::id() }}" ||
                                            "{{ Auth::id() }}" ==
                                            "{{ $post->user_id }}");

                                    let replyProfilePicture = reply.user
                                        .profile_picture ?
                                        `/img/profilePicture/${reply.user.profile_picture}` :
                                        `/img/profilePicture/default.jpg`;

                                    commentsHtml += `
                        <div class="reply ms-4 mb-3" data-id="${reply.id}">
                            <a href="{{ route('profile', '') }}/${reply.user.username}" style="color: inherit; text-decoration: none;">
                                <img src="${replyProfilePicture}"
                                    alt=""
                                    class="rounded-circle border border-4 border-white-color-40"
                                    width="35" height="35"
                                    style="object-fit: cover;">
                                <b>${reply.user.name}</b>
                            </a>
                            <p class="mt-1">${reply.content}</p>
                            <small>${dayjs(reply.created_at).fromNow()}</small>
                            ${canDeleteReply ? `<button class="btn btn-sm ms-2 btn-outline-danger delete-comment">Delete</button>` : ""}
                        </div>
                        `;
                                });
                            }
                        });
                        $("#comments-list").html(commentsHtml);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }


            // Panggil loadComments pertama kali
            loadComments();

            // Event Klik Tombol Delete Comment
            $(document).on("click", ".delete-comment", function() {
                let commentDiv = $(this).closest(".comment, .reply");
                let commentId = commentDiv.data("id");

                if (!confirm("Are you sure you want to delete this comment?")) return;

                $.ajax({
                    url: `/comments/${commentId}`,
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        commentDiv.remove(); // Hapus komentar dari tampilan
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert("Failed to delete comment.");
                    }
                });
            });

            loadComments();

            // Event Klik Tombol Post Comment
            $(document).on("click", "#post-comment", function() {
                let content = $("#comment-content").val().trim();
                if (content === "") {
                    alert("Comment cannot be empty");
                    return;
                }

                $.ajax({
                    url: "{{ route('comments.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        post_id: postId,
                        content: content
                    },
                    success: function() {
                        $("#comment-content").val(""); // Reset input
                        loadComments(); // Muat ulang komentar
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert("Failed to post comment.");
                    }
                });
            });

            // Event Klik Tombol Reply (Delegated Event)
            $(document).on("click", ".reply-btn", function() {
                let commentDiv = $(this).closest(".comment");
                let commentId = commentDiv.data("id");

                // Cek apakah sudah ada input reply sebelumnya
                if (commentDiv.find(".reply-input").length === 0) {
                    commentDiv.append(`
                        <div class="reply-input mt-2">
                            <textarea class="form-control reply-content" placeholder="Write a reply..."></textarea>
                            <button class="btn btn-sm btn-primary mt-1 post-reply" data-comment-id="${commentId}">Reply</button>
                            <button class="btn btn-sm btn-danger mt-1 ms-1 cancel-reply">Cancel</button>
                        </div>
                    `);
                }
            });

            // Event Klik Tombol Cancel (❌)
            $(document).on("click", ".cancel-reply", function() {
                $(this).closest(".reply-input").remove(); // Hapus form reply
            });

            // Event Klik Tombol Post Reply
            $(document).on("click", ".post-reply", function() {
                let replyDiv = $(this).closest(".comment");
                let commentId = $(this).data("comment-id");
                let content = replyDiv.find(".reply-content").val().trim();

                if (content === "") {
                    alert("Reply cannot be empty");
                    return;
                }

                $.ajax({
                    url: "{{ route('comments.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        post_id: postId,
                        content: content,
                        parent_id: commentId
                    },
                    success: function() {
                        loadComments(); // Muat ulang komentar & replies
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert("Failed to post reply.");
                    }
                });
            });
        });
    </script>


</x-layout>
