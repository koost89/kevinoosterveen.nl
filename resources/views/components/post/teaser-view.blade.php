<div class="flex flex-col">
    <a href="{{ route('posts.show', $post->id) }}" class="bg-transition-underline">
        <img class="w-full h-36 p-2 bg-gray-200 rounded-md" src="{{ asset('storage/uploads/laravel.svg') }}" alt="logo">
        <div class="mt-4">
            <span class="font-bold text-2xl">{{ $post->title }}</span>
        </div>
    </a>
    <div class="flex flex-1 mt-4">
        <div class="flex flex-wrap w-1/2">
        @foreach($post->tags as $tag)
            <span class="flex text-xs p-1 space-x-2 hover:cursor-pointer">
                {{ $tag->name }}
            </span>
        @endforeach
        </div>
        <div class="flex ml-auto mt-auto text-sm">
            {{ $createdAt }}
        </div>
    </div>
</div>
