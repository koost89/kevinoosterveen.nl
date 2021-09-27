<div x-data="{ open: @entangle('showResults').defer }" x-init @click.away="open = false" >
    <div >
        <input placeholder="Search..." class="w-1/3 bg-black rounded-lg" type="text" wire:model.debounce="query">
        <div x-show="open" class="flex flex-col w-1/3 space-y-4 bg-gray-500 p-2">
            @forelse($this->posts as $post)
                <div>
                    <div class="font-bold">{{ $post->title }}</div>
                    <div>{{ Str::limit($post->text) }}</div>
                </div>
            @empty
                <div>
                    No results found.
                </div>
            @endforelse
        </div>
    </div>
</div>
