<div class="w-full" x-data="{ open: @entangle('showResults').defer }" x-init @click.away="open = false" >
    <input placeholder="Search..." class="w-full bg-black rounded-lg focus:outline-none" type="text" wire:model.debounce.350ms="query">
    <div x-show="open" class="absolute flex flex-col space-y-4 bg-gray-500 p-2">
        @forelse($this->posts as $post)
            <div class="search-result post">
                <div class="post-result-item title">{!! $post['title'] !!}</div>
                <div class="post-result-item excerpt"> {!! $post['excerpt'] !!}</div>
            </div>
        @empty
            <div>
                No results found.
            </div>
        @endforelse
    </div>
</div>
