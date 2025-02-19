<x-layout>
    <x-slot:title>{{ $profile->name . ' (@' . $profile->username . ') - Writely' }}</x-slot:title>
    <h2>View {{ Auth::check() && Auth::user()->id == $profile->id ? 'your ' : $profile->name . ' ' }}
        posts:
    </h2>
    @forelse ($posts as $post)
        <x-cards.post-big :post="$post" />
    @empty
        <p>No post yet.</p>
    @endforelse
</x-layout>
