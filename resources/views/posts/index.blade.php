<x-guest-layout>
    <x-slot name="title">{{  __("Hi there!") }}</x-slot>

    @forelse($posts as $post)
        <x-post.teaser-view :post="$post"/>
    @empty
        No posts found.
    @endforelse

    @if($posts->hasMorePages())
        {{ $posts->links() }}
    @endif

</x-guest-layout>

