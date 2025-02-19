<x-layout>
    <x-slot:title>Writely</x-slot:title>
    {{-- <x-slot:title>Writely</x-slot:title> --}}
    <style>

    </style>
    @forelse ($posts as $post)
        <x-cards.post-big :post="$post" />
    @empty
        <div class="col-md-12" align="center">
            <i>No post yet.</i>
        </div>
    @endforelse
</x-layout>
