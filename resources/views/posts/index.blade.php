<x-guest-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
        @forelse($posts as $post)
            <x-post.teaser-view :post="$post"/>
        @empty
            <div>
                No posts found
            </div>
        @endforelse
    </div>

    {{ $posts->links() }}
</x-guest-layout>

