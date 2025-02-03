<x-layout>
    <div class="container-fluid">
        @if (session('successEditProfile'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('successEditProfile') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session('errorOldPassword'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('errorOldPassword') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session('errorNewPassword'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('errorNewPassword') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session('successChangePassword'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('successChangePassword') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        {{-- Change profile picture --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between pt-4 pb-6 px-4">
                    <div class="d-flex align-items-center">
                        <div
                            class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt=""
                                class="avatar-xxl rounded-circle border border-4 border-white-color-40" width="80"
                                height="80">
                            {{-- <a class="position-absolute top-0 right-0 me-2" data-bs-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Verified"
                                href="/pages/profile#!"><img src="https://placehold.co/400" alt=""
                                    height="30" width="30" class="">
                            </a> --}}
                        </div>
                        <div class="lh-1">
                            <h2 class="mb-0">{{ $profile->name }}<a class="text-decoration-none"
                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Beginner" href="/pages/profile#!"></a></h2>
                            <p class="mb-2 d-block"><i>{{ '@' . $profile->username }}</i></p>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#change-profile-picture">Change Profile Picture</button>
                    </div>

                    {{-- modal --}}
                    <div class="modal fade" id="change-profile-picture" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Change Profile Picture</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" align="center">
                                    <input type="file" name="new_profile_picture" class="form-control">
                                    <div id="" class="form-text">Upload your picture</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Delete Account</button>
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
                            id="" aria-describedby="">
                        <div id="" class="form-text">This name will diplay in you profile</div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $profile->username }}"
                            id="" aria-describedby="">
                        <div id="" class="form-text">This username will be your profile name</div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" id="" cols="30" rows="3">{{ $profile->bio }}</textarea>
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
                <div class="mb-3">
                    <label for="" class="form-label">Curent Email address</label>
                    <input type="text" class="form-control" value="{{ $profile->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">New Email address</label>
                    <input name="new_email1" class="form-control" id="" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Email address</label>
                    <input name="new_email2" class="form-control" id="" aria-describedby="">
                </div>
                <div align="right">
                    <button class="btn btn-primary">Change Email</button>
                </div>
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
                        <input type="password" name="old_password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" name="new_password1" class="form-control" id=""
                            aria-describedby="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="new_password2" class="form-control" id=""
                            aria-describedby="">
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
                    <div>
                        <div id="" class="mb-3 form-text">Please don't do anything silly</div>
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
                                        style="color: rgb(235, 0, 0)">Delete Account</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" align="center">
                                    <div id="" class="mb-3 form-text" style="color: red">Are you sure want
                                        to delete your
                                        precious account?</div>
                                    <input type="text" name="password" class="form-control"
                                        style="border: 1px solid red">
                                    <div id="" class="form-text">Enter your password</div>
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
                </div>
            </div>
        </div>
    </div>

</x-layout>
