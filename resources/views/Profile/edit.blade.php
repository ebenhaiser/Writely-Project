<x-layout>
    <x-slot:title>{{ $profile->name . ' (@' . $profile->username . ') - Writely' }}</x-slot:title>

    {{-- Change profile picture --}}
    <style>
        .avatar-profile img {
            /* width: 100px;
                height: 100px; */
            object-fit: cover;
        }

        .profile-name h2 {
            font-size: 18px;
        }

        .profile-name p {
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .avatar-profile img {
                width: 80px;
                height: 80px;
            }

            .profile-name h2 {
                font-size: 18px;
            }

            .profile-name p {
                font-size: 14px;
            }

            .btn-edit-profile a {
                font-size: 12px;
                width: 60px;
                padding: 4px 8px;
            }

            .profile-post-follow span h5,
            .profile-post-follow span p {
                font-size: 14px
            }
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between pt-4 pb-6 px-0">
                <div class="d-flex align-items-center avatar-edit">
                    <div
                        class="avatar-profile avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                        <img src="{{ asset('img/profilePicture/' . (Auth::user()->profile_picture && file_exists(public_path('img/profilePicture/' . Auth::user()->profile_picture)) ? Auth::user()->profile_picture : 'default.jpg')) }}"
                            alt="" class="avatar-xxl rounded-circle border border-4 border-white-color-40"
                            width="80" height="80">
                        {{-- <a class="position-absolute top-0 right-0 me-2" data-bs-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Verified"
                                href="/pages/profile#!"><img src="https://placehold.co/400" alt=""
                                    height="30" width="30" class="">
                            </a> --}}
                    </div>
                    <div class="lh-1 profile-name">
                        <h2 class="mb-0">{{ $profile->name }}<a class="text-decoration-none" data-bs-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Beginner"
                                href="/pages/profile#!"></a></h2>
                        <p class="mb-2 d-block"><i>{{ '@' . $profile->username }}</i></p>
                    </div>
                </div>
                <div align="right">
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#change-profile-picture">Change Profile Picture</button>
                    @if (Auth::user()->profile_picture &&
                            file_exists(public_path('img/profilePicture/' . Auth::user()->profile_picture)) &&
                            Auth::user()->profile_picture != 'default.jpg')
                        <br>
                        <button type="button" class="btn btn-danger mt-1" data-bs-toggle="modal"
                            data-bs-target="#delete-profile-picture">Delete Profile Picture</button>
                    @endif
                </div>

                {{-- modal --}}
                <div class="modal fade" id="change-profile-picture" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Change Profile Picture</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('update.profile.picture', $profile->username) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body" align="center">
                                    <input type="file" name="profile_picture" accept="image/*" class="form-control"
                                        required>
                                    <div id="" class="form-text">Upload your picture</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary">Change Picture</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="delete-profile-picture" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Delete Profile Picture</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" align="center">
                                <img src="{{ asset('img/profilePicture/' . (Auth::user()->profile_picture && file_exists(public_path('img/profilePicture/' . Auth::user()->profile_picture)) ? Auth::user()->profile_picture : 'default.jpg')) }}"
                                    alt=""
                                    class="avatar-xxl rounded-circle border border-4 border-white-color-40"
                                    width="130" height="130">
                                <p class="mt-2"><i>Are you sure want to delete your profile picture?</i></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ route('delete.profile.picture', $profile->username) }}"
                                    class="btn btn-danger">Delete Profile
                                    Picture</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}
            </div>
        </div>
    </div>


    {{-- Change profile --}}
    <div class="card">
        <div class="card-header">
            <div class="h3">Profile</div>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.edit.submit', $profile->username) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Display Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $profile->name }}"
                        id="" aria-describedby="" maxlength="50">
                    <div id="" class="form-text">This name will diplay in you profile</div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $profile->username }}"
                        id="" aria-describedby="" required maxlength="25">
                    <div id="" class="form-text">This username will be your profile name</div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Bio</label>
                    <input type="text" name="bio" class="form-control" value="{{ $profile->bio }}"
                        maxlength="100">
                    <div id="" class="form-text">Type something fun about yourself</div>
                </div>
                <div align="right">
                    <button class="btn btn-primary">Change Profile</button>
                </div>
            </form>
        </div>
    </div>


    {{-- change email --}}
    <div class="card">
        <div class="card-header">
            <div class="h3">Email</div>
        </div>
        <div class="card-body">
            <form action="{{ route('change.email.submit', $profile->username) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Curent Email address</label>
                    <input type="text" class="form-control" value="{{ $profile->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">New Email address</label>
                    <input name="new_email1" class="form-control" id="" aria-describedby="" required
                        maxlength="50">
                </div>
                <div align="right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#change-email">Change Email</button>
                </div>

                {{-- modal --}}
                <div class="modal fade" id="change-email" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Change Email</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" align="center">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter password" required>
                                <div id="" class="form-text">Enter your password for changing email</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Change Email</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}
            </form>
        </div>
    </div>


    {{-- change password --}}
    <div class="card">
        <div class="card-header">
            <div class="h3">Change Password</div>
        </div>
        <div class="card-body">
            <form action="{{ route('change.password.submit', $profile->username) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Current Password</label>
                    <input type="password" name="old_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">New Password</label>
                    <input type="password" name="new_password1" class="form-control" id=""
                        aria-describedby="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" name="new_password2" class="form-control" id=""
                        aria-describedby="" required>
                </div>
                <div align="right">
                    <button class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>


    {{-- delete account --}}
    <style>
        .card-delete-account .card {
            border: solid 1px red;
        }

        .card-delete-account .card .card-header {
            background-color: #f8d7da;
            border-bottom: solid 1px red;
        }
    </style>
    <div class="card-delete-account">
        <div class="card">
            <div class="card-header">
                <div class="h3">Danger Zone</div>
            </div>
            <div class="card-body">
                <form action="{{ route('delete.account.submit', $profile->username) }}" method="post">
                    @csrf
                    <div>
                        <div id="" class="mb-3 form-text">Please don't do anything silly
                        </div>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-account-modal">Delete Account</button>
                    </div>

                    {{-- modal --}}
                    <div class="modal fade" id="delete-account-modal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"
                                        style="color: rgb(235, 0, 0)">Delete
                                        Account</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="" class="mb-3 form-text" style="color: red">Are you sure
                                        want
                                        to DELETE your precious account?</div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" required>
                                    </div>
                                    <div class="">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div id="" class="mb-3 form-text" style="color: red">Enter your
                                        email
                                        and password to DELETE your account</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}
                </form>
            </div>
        </div>
    </div>
</x-layout>
