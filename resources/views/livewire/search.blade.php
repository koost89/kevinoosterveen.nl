<div class="search-wrapper" x-data="{ open: @entangle('showResults').defer }" x-init @click.away="open = false" >
    <input placeholder="Search..." class="w-full bg-black rounded-lg focus:outline-none" type="text" wire:model.debounce.350ms="query">
    <div x-show="open" class="search-results">
        @forelse($this->posts as $post)
            <a class="search-result post" href="{{ route('posts.show', $post['slug']) }}">
                <div class="post-result-item title">{!! $post['title'] !!}</div>
                <div class="post-result-item excerpt"> {!! $post['excerpt'] !!}</div>
            </a>
        @empty
            <div>
                No results found.
            </div>
        @endforelse
    </div>
</div>
