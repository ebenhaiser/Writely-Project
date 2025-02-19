<x-layout>
    <style>
        @media (min-width: 768px) {
            .page-header h1 {
                position: fixed;
            }
        }
    </style>
    <x-slot:title>Top Author - Writely</x-slot:title>
    <div class="row">
        <div class="col-lg-3 page-header">
            <h1 align="center" style="">Top Authors</h1>
        </div>
        <div class="col-lg-9">
            @foreach ($users->take(10) as $user)
                <div class="card user-card">
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
                                    @if (!Auth::check() || Auth::id() !== $user->id)
                                        <button class="btn btn-outline-primary follow-btn"
                                            data-user-id="{{ $user->id }}">
                                            <span
                                                class="follow-text">{{ $user->isFollowedByUser() ? 'Unfollow' : 'Follow' }}</span>
                                        </button>
                                    @else
                                        <p class="my-auto text-muted">You</p>
                                    @endif
                                </div>
                                <div class="mt-2" align="right">
                                    <i><span class="follower-count">{{ count($user->followers) }}</span>
                                        follower</i>
                                </div>
                                <div class="mt-1" align="right">
                                    <i>{{ $user->total_likes . ' ' }}Likes</i>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
