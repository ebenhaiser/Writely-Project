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
