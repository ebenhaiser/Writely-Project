<x-layout>
    <style>
        .follow-profile img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    @if ($users)
        <h3 class="mb-3">Users:</h3>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-6 card follow-profile">
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
                                    @if (Auth::check() && Auth::user()->id != $user->id)
                                        <button class="btn btn-outline-primary follow-btn"
                                            data-user-id="{{ $user->id }}">
                                            <span
                                                class="follow-text">{{ $user->isFollowedByUser() ? 'Unfollow' : 'Follow' }}</span>
                                        </button>
                                    @else
                                        <p style="color: gray" class="my-auto">You</p>
                                    @endif
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if ($posts)
        <h3 class="mb-3">Posts:</h3>
        @foreach ($posts as $post)
            <div class="card">
                <p>{{ $post->title }}</p>
            </div>
        @endforeach
    @endif


</x-layout>
