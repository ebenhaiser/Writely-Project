<x-layout>
    <x-slot:title>{{ $profile->name . ' (@' . $profile->username . ') - Writely' }}</x-slot:title>
    <style>
        .avatar-profile img {
            width: 100px;
            height: 100px;
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
                width: 60px;
                height: 60px;
            }

            .profile-name h2 {
                font-size: 16px;
            }

            .profile-name p {
                font-size: 12px;
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

    <div class="card shadow">
        <div class="align-items-center row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                {{-- <div class="pt-20 rounded-top"
                        style="background: url(https://placehold.co/400) 0% 0% / cover no-repeat;">
                    </div> --}}
                <div class="bg-white rounded-bottom smooth-shadow-sm ">
                    <div class="d-flex align-items-center justify-content-between pt-4 pb-6 px-4">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar-profile avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                <img src="{{ asset('img/profilePicture/' . ($profile->profile_picture && file_exists(public_path('img/profilePicture/' . $profile->profile_picture)) ? $profile->profile_picture : 'default.jpg')) }}"
                                    alt=""
                                    class="avatar-xxl rounded-circle border border-4 border-white-color-40">
                                {{-- <a class="position-absolute top-0 right-0 me-2" data-bs-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Verified"
                                        href="/pages/profile#!"><img src="https://placehold.co/400" alt=""
                                            height="30" width="30" class="">
                                    </a> --}}
                            </div>
                            <div class="lh-1 profile-name me-4">
                                <h2 class="mb-0 ms-1">{{ $profile->name }}
                                    <p class="mb-2 d-block"><i>{{ '@' . $profile->username }}</i></p>
                                    @if ($profile->bio)
                                        <p>{{ $profile->bio }}</p>
                                    @endif
                            </div>
                        </div>
                        @if (Auth::check() && Auth::user()->username == $profile->username)
                            <divc class="btn-edit-profile">
                                <a class="btn btn-outline-primary"
                                    href="{{ route('profile.edit', $profile->username) }}">Edit Profile</a>
                            </divc>
                        @else
                            <button class="btn btn-primary follow-btn" data-user-id="{{ $profile->id }}">
                                <span
                                    class="follow-text">{{ $profile->isFollowedByUser() ? 'Unfollow' : 'Follow' }}</span>
                            </button>
                        @endif
                    </div>
                    <div class="mt-3 mb-3 px-4 d-flex gap-5 profile-post-follow">
                        <span>
                            <a href="{{ route('profile.posts', $profile->username) }}"
                                style="color: inherit; text-decoration: none;">
                                <h6>Post</h6>
                                <p align="center">{{ count($profile->posts) }}</p>
                            </a>
                        </span>
                        <span>
                            <a href="{{ route('profile.following', $profile->username) }}"
                                style="color: inherit; text-decoration: none;">
                                <h6>Following</h6>
                                <p align="center">{{ count($profile->following) }}</p>
                            </a>
                        </span>
                        <span>
                            <a href="{{ route('profile.followers', $profile->username) }}"
                                style="color: inherit; text-decoration: none;">
                                <h6>Followers</h6>
                                <p align="center" class="follower-count">{{ count($profile->followers) }}</p>
                            </a>
                        </span>
                    </div>
                    <div class="profile-nav">
                        <ul class="nav nav-underline nav-fill">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('profile', $profile->username) }}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('profile.likes') ? 'active' : '' }}"
                                    href="{{ route('profile.likes', $profile->username) }}">Likes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('profile.comments') ? 'active' : '' }}"
                                    href="{{ route('profile.comments', $profile->username) }}">Comments</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4">
                <x-cards.post-mini :post="$post" />
            </div>
        @empty
            <div class="col-md-12" align="center">
                <i>No post yet.</i>
            </div>
        @endforelse
    </div>
</x-layout>
