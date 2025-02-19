<x-layout>
    <style>
        @media (min-width: 768px) {
            .message-section .back-button {
                display: none;
            }
        }

        .message-section .messages-card .card-body {
            max-height: calc(100vh - 297px);
            /* Sesuaikan dengan layout */
            overflow-y: auto;
            position: relative;
        }

        .scroll-to-bottom-btn {
            position: sticky;
            /* Membuat button tetap di posisi bawah dalam card-body */
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            opacity: 0;
            /* Mulai dengan button tersembunyi */
            transition: opacity 0.3s ease-in-out;
        }

        .message-section .messages-card .card-body .messages-container {
            padding-bottom: 50px;
            /* Tambahkan padding di bagian bawah untuk memastikan bubble chat tidak terhalang button */
        }
    </style>
    <x-slot:title>Message - Writely</x-slot:title>
    <div class="row">
        <!-- User List -->
        <div class="col-md-5
            @if (request()->routeIs('messaging.with')) d-none d-md-block @endif">
            <div class="card users-card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Users</h3>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#users">
                            <i class='bx bx-plus'></i>
                        </button>

                        <div class="modal fade" id="users" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Start Chatting With</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="text" class="form-control"
                                                placeholder="Search any user you wanna chat with..." />
                                        </div>
                                        @foreach ($users as $user)
                                            <a href="{{ route('messaging.with', $user->username) }}"
                                                style="color: inherit; text-decoration: none;">
                                                <div class="d-flex gap-3">
                                                    <img src="{{ asset('img/profilePicture/' . ($user->profile_picture && file_exists(public_path('img/profilePicture/' . $user->profile_picture)) ? $user->profile_picture : 'default.jpg')) }}"
                                                        alt="" class="avatar-xxl rounded-circle border"
                                                        width="40" height="40">
                                                    <div>
                                                        <span style="font-weight: 700">{{ $user->name }}</span>
                                                        <p><i>{{ '@' . $user->username }}</i></p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($usersWithLastMessage as $user)
                        <div>
                            <a href="{{ route('messaging.with', $user->username) }}"
                                style="color: inherit; text-decoration: none;">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-3">
                                        <img src="{{ asset('img/profilePicture/' . ($user->profile_picture && file_exists(public_path('img/profilePicture/' . $user->profile_picture)) ? $user->profile_picture : 'default.jpg')) }}"
                                            alt="" class="avatar-xxl rounded-circle border" width="40"
                                            height="40">
                                        <div>
                                            <span style="font-weight: 700">{{ $user->name }}</span>
                                            <div class="d-flex justify-content-between">
                                                <p>
                                                    @if ($user->lastMessage)
                                                        @if ($user->lastMessage->from_user_id == Auth::id())
                                                            <strong>You:</strong> {{ $user->lastMessage->message }}
                                                        @else
                                                            {{ $user->lastMessage->message }}
                                                        @endif
                                                    @else
                                                        No messages
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <span>{{ $user->lastMessage->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="col-md-7 message-section
            @if (request()->routeIs('messages')) d-none d-md-block @endif">
            @if (request()->routeIs('messages'))
                <div class="card messages-card">
                    <div class="card-body">
                        <i>Go chat with another user</i>
                    </div>
                </div>
            @elseif (request()->routeIs('messaging.with'))
                <a href="{{ route('messages') }}" class="back-button btn btn-secondary mb-3 mt-2">
                    <i class='bx bx-arrow-back'></i>
                </a>
                <div class="card messages-card shadow">
                    <div class="card-header">
                        <div class="d-flex gap-3">
                            <img src="{{ asset('img/profilePicture/' . ($receiver->profile_picture && file_exists(public_path('img/profilePicture/' . $receiver->profile_picture)) ? $receiver->profile_picture : 'default.jpg')) }}"
                                alt="" class="avatar-xxl rounded-circle border" width="40" height="40">
                            <div>
                                <span style="font-weight: 700">{{ $receiver->name }}</span>
                                <p><i>{{ '@' . $receiver->username }}</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-messages-section :receiver="$receiver" />
                        <button class="btn btn-primary scroll-to-bottom-btn" id="scrollToBottom">
                            <i class='bx bx-arrow-to-bottom'></i>
                        </button>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex gap-2">
                            <input type="text" id="messageInput" class="form-control"
                                placeholder="Type your message..." style="background-color: white" autocomplete="off">
                            <button class="btn btn-primary" id="sendMessage" type="submit">
                                <i class='bx bx-send'></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // AUTO SCROLL KEBAWAH KETIKA DI LOAD
        $(document).ready(function() {
            var firstLoad = true; // Flag untuk mendeteksi load pertama

            function scrollToBottom() {
                var chatBody = $(".messages-card .card-body");
                chatBody.scrollTop(chatBody[0].scrollHeight);
            }

            // Auto-scroll hanya saat pertama kali halaman dimuat
            $(document).on("ajaxComplete", function(event, xhr, settings) {
                if (firstLoad) {
                    scrollToBottom();
                    firstLoad = false; // Setelah pertama kali, auto-scroll tidak akan dijalankan lagi
                }
            });
        });

        // SCROLL TO BOTTON BUTTON
        document.addEventListener('DOMContentLoaded', function() {
            const messageBody = document.querySelector('.message-section .messages-card .card-body');
            const scrollButton = document.getElementById('scrollToBottom');
            let lastScrollTop = 0; // Untuk melacak posisi scroll sebelumnya

            // Menampilkan button saat scroll ke atas
            messageBody.addEventListener('scroll', function() {
                let scrollTop = messageBody.scrollTop;

                // Jika scroll bergerak ke atas
                if (scrollTop < lastScrollTop) {
                    scrollButton.style.opacity = '1'; // Munculkan button
                } else {
                    scrollButton.style.opacity = '0'; // Sembunyikan button saat scroll ke bawah
                }

                lastScrollTop = scrollTop <= 0 ? 0 :
                    scrollTop; // Pastikan tidak terjadi nilai negatif pada scrollTop
            });

            // Scroll ke bawah saat button di klik
            scrollButton.addEventListener('click', function() {
                messageBody.scrollTo({
                    top: messageBody.scrollHeight,
                    behavior: 'smooth' // Scroll dengan transisi smooth
                });
            });
        });
    </script>

</x-layout>
