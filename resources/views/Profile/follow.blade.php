div<x-layout>
    <style>
        .follow-profile img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    <h2>View {{ $profile->name }} following:</h2>
    <div class="row">
        @forelse ($users as $user)
            <div class="col-md-6">
                <div class="card follow-profile">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('profile', $user->username) }}"
                                style="color: inherit; text-decoration: none;">
                                <span class="d-flex">
                                    <span>
                                        <div class="me-2">
                                            <img src="{{ asset('img/profilePicture/' . ($user->profile_picture && file_exists(public_path('img/profilePicture/' . $user->profile_picture)) ? $user->profile_picture : 'default.jpg')) }}"
                                                alt=""
                                                class="rounded-circle border border-4 border-white-color-40">
                                        </div>
                                    </span>
                                    <span class="my-auto">
                                        <h6 class="mt-0 mb-0">{{ $user->name }}</h6>
                                        <p class="mb-0 mt-0 text-body" style="text-decoration: none">
                                            {{ '@' . $user->username }}</p>
                                    </span>
                                </span>
                            </a>
                            <span class="my-auto">
                                <div align="right">
                                    <button class="btn btn-outline-primary follow-btn"
                                        data-user-id="{{ $user->id }}">
                                        <span
                                            class="follow-text">{{ $user->isFollowedByUser() ? 'Unfollow' : 'Follow' }}</span>
                                    </button>

                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>
                            <h7>Post</h7>
                            <p>{{ count($user->posts) }}</p>
                        </span>
                        <span>
                            <h7>Following</h7>
                            <p>{{ count($profile->following) }}</p>
                        </span>
                        <span>
                            <h6>Followers</h6>
                            <p class="follower-count">{{ count($user->followers) }}</p>
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <p class="mt-3">No {{ request()->routeIs('profile.following') ? 'following' : 'folloewer' }} yet.</p>
        @endforelse
    </div>
</x-layout>
