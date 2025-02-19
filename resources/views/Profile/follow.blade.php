<x-layout>
    <x-slot:title>{{ $profile->name . ' (@' . $profile->username . ') - Writely' }}</x-slot:title>
    <h2>View {{ Auth::check() && Auth::user()->id == $profile->id ? 'your' : $profile->name }}
        {{ request()->routeIs('profile.following') ? 'following' : 'follower' }}:</h2>
    <div class="row">
        @forelse ($users as $user)
            <div class="col-md-6">
                <x-cards.user :user="$user" />
            </div>
        @empty
            <p class="mt-3">No {{ request()->routeIs('profile.following') ? 'following' : 'follower' }} yet.</p>
        @endforelse
    </div>
</x-layout>
