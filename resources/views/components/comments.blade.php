@auth
    <div class="d-flex gap-2">
        <input id="comment-content" class="form-control" placeholder="Write a comment..." />
        <button id="post-comment" class="btn btn-primary">Post</button>
    </div>
@endauth
<div id="comments-list" class="mb-3"></div>

<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
        /* padding-left: 40px; */
    }

    /* HAPUS GARIS SEBELAH KIRI, tapi tetap menyisakan garis di bawah foto */
    ul.timeline:before {
        display: none;
        /* Garis kiri dihapus */
    }

    ul.timeline>li {
        margin: 20px 0;
        position: relative;
        padding-left: 20px;
        min-height: 60px;
        /* Menyesuaikan tinggi agar tidak terlalu dekat */
    }

    ul.timeline>li .comment-box {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 10px;
        padding-left: 8px;
        display: inline-block;
        max-width: 90%;
        position: relative;
        margin-left: 60px;
        /* Menyesuaikan jarak dengan foto */
    }

    ul.timeline>li:before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        width: 40px;
        height: 0px;
        background-size: cover;
        background-position: center;
        background-color: white;
        border-radius: 50%;
        /* border: 3px solid #333; */
        z-index: 2;
    }

    ul.timeline>li .profile-img {
        position: absolute;
        left: 10px;
        top: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        /* border: 3px solid #333; */
        z-index: 3;
    }

    /* Garis hanya mulai dari bawah foto */
    ul.timeline>li:after {
        content: '';
        position: absolute;
        left: 30px;
        top: 55px;
        /* Mulai tepat di bawah foto */
        width: 2px;
        height: calc(100% - 55px);
        background: #d4d9df;
        z-index: 1;
    }

    /* Style untuk Reply */
    .reply {
        margin-left: 50px;
        position: relative;
    }

    .reply:before {
        display: none;
        /* Garis kiri reply dihapus */
    }

    .reply .profile-img {
        width: 40px;
        height: 40px;
        left: 10px;
        top: 5px;
    }

    .replies {
        margin-left: 40px;
    }

    .comment-box b,
    .comment-box i,
    .comment-box button {
        color: black !important;
        text-decoration: none !important;
    }
</style>

<!-- Load jQuery jika belum -->
<script>
    $(document).ready(function() {
        let postId = {{ $post->id }};

        // Fungsi Load Komentar
        function loadComments() {
            $.ajax({
                url: "{{ route('comments.index', $post->id) }}",
                method: "GET",
                success: function(response) {
                    let commentsHtml = '<ul class="timeline">';

                    response.forEach(comment => {
                        let canDelete = "{{ Auth::check() }}" &&
                            (comment.user_id == "{{ Auth::id() }}" ||
                                "{{ Auth::id() }}" == "{{ $post->user_id }}");

                        let profilePicture = comment.user.profile_picture ?
                            `/img/profilePicture/${comment.user.profile_picture}` :
                            `/img/profilePicture/default.jpg`;

                        commentsHtml += `
                <li class="comment" data-id="${comment.id}">
                    <a href="{{ route('profile', '') }}/${comment.user.username}">
                    <img src="${profilePicture}" class="profile-img">
                    <div class="comment-box">
                            ${comment.user.name ? `<b>${comment.user.name}</b><br />` : ""}
                            <i>&#64;${comment.user.username}</i>
                        </a>
                        <p class="mt-1">${comment.content}</p>
                        <small>${dayjs(comment.created_at).fromNow()}</small>
                        <button class="btn btn-sm btn-link reply-btn">Reply</button>
                        ${canDelete ? `<button class="btn btn-sm btn-link delete-comment">Delete</button>` : ""}
                    </div>
                    <ul class="timeline replies">`;

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
                        <li class="reply" data-id="${reply.id}">
                            <a href="{{ route('profile', '') }}/${reply.user.username}">
                            <img src="${replyProfilePicture}" class="profile-img">
                            <div class="comment-box">
                                    <b>${reply.user.name}</b>
                                    <br />
                                    <i>&#64;${reply.user.username}</i>
                                </a>
                                <p class="mt-1">${reply.content}</p>
                                <small>${dayjs(reply.created_at).fromNow()}</small>
                                <button class="btn btn-sm btn-link reply-btn">Reply</button>
                                ${canDeleteReply ? `<button class="btn btn-sm btn-link delete-comment">Delete</button>` : ""}
                            </div>
                        </li>`;
                            });
                        }

                        commentsHtml += `</ul></li>`;
                    });

                    commentsHtml += '</ul>';
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
            let commentDiv = $(this).closest("li");
            let commentId = commentDiv.data("id");

            if (!confirm("Are you sure you want to delete this comment?")) return;

            $.ajax({
                url: `/comments/${commentId}`,
                method: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    commentDiv.remove(); // Hapus komentar dari tampilan
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert("Failed to delete comment.");
                }
            });
        });

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

        // Event Klik Tombol Reply
        $(document).on("click", ".reply-btn", function() {
            let commentDiv = $(this).closest("li.comment");

            if (commentDiv.find(".reply-input").length === 0) {
                commentDiv.append(`
            <div class="reply-input mt-2 ms-5">
                <input class="form-control reply-content" placeholder="Write a reply..." />
                <button class="btn btn-sm btn-primary mt-1 post-reply">Reply</button>
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
            let replyDiv = $(this).closest("li.comment");
            let commentId = replyDiv.data("id");
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
