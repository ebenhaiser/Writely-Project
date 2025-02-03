<x-layout>
    <div class="caontainer-fluid">
        <div class="card">
            <div class="align-items-center row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    {{-- <div class="pt-20 rounded-top"
                        style="background: url(https://placehold.co/400) 0% 0% / cover no-repeat;">
                    </div> --}}
                    <div class="bg-white rounded-bottom smooth-shadow-sm ">
                        <div class="d-flex align-items-center justify-content-between pt-4 pb-6 px-4">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt=""
                                        class="avatar-xxl rounded-circle border border-4 border-white-color-40"
                                        width="120" height="120">
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
                                    @if ($profile->bio)
                                        <p>{{ $profile->bio }}</p>
                                    @endif
                                </div>
                            </div>
                            @if (Auth::check() && Auth::user()->username == $profile->username)
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('profile.edit', $profile->username) }}">Edit Profile</a>
                                </div>
                            @else
                                <a class="btn btn-primary" href="">Follow</a>
                            @endif
                        </div>
                        <div class="mt-3 mb-3 px-4 d-flex gap-5">
                            <span>
                                <h5>Post</h5>
                                <p>0</p>
                            </span>
                            <span>
                                <h5>Following</h5>
                                <p>0</p>
                            </span>
                            <span>
                                <h5>Followers</h5>
                                <p>0</p>
                            </span>
                        </div>

                        <style>
                            .profile-nav .nav-underline .active {
                                border-bottom: 3px solid #000000;
                            }

                            .profile-nav .nav .nav-link {
                                color: #000000;
                                font-weight: 700;
                            }
                        </style>
                        <div class="profile-nav">
                            <ul class="nav nav-underline nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Likes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
