<x-layout>
    <style>
        @media (min-width: 768px) {
            .message-section .back-button {
                display: none;
            }
        }
    </style>
    <x-slot:title>Messenger - Writely</x-slot:title>
    <div class="row">
        <!-- User List -->
        <div class="col-md-5
            @if (request()->routeIs('messages.section')) d-none d-md-block @endif">
            <div class="card users-card">
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
                                        <a href="{{ route('messages.section', 10) }}"
                                            style="color: inherit; text-decoration: none;">
                                            <div class="d-flex gap-3">
                                                <img src="{{ asset('img/profilePicture/default.jpg') }}" alt=""
                                                    class="avatar-xxl rounded-circle border" width="40"
                                                    height="40">
                                                <div>
                                                    <span style="font-weight: 700">Name</span>
                                                    <p>Username</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{ route('messages.section', 10) }}" style="color: inherit; text-decoration: none;">
                            <div class="d-flex gap-3">
                                <img src="{{ asset('img/profilePicture/default.jpg') }}" alt=""
                                    class="avatar-xxl rounded-circle border" width="40" height="40">
                                <div>
                                    <span style="font-weight: 700">Name</span>
                                    <p>Messages</p>
                                </div>
                            </div>
                        </a>
                    </div>
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
            @elseif (request()->routeIs('messages.section'))
                <a href="{{ route('messages') }}" class="back-button btn btn-secondary mb-3 mt-2">
                    <i class='bx bx-arrow-back'></i>
                </a>
                <div class="card messages-card">
                    <div class="card-header">
                        <div class="d-flex gap-3">
                            <img src="{{ asset('img/profilePicture/default.jpg') }}" alt=""
                                class="avatar-xxl rounded-circle border" width="40" height="40">
                            <div>
                                <span style="font-weight: 700">Name</span>
                                <p>Username</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-messages-section />
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
