<x-guest-layout>
    <x-slot name="title">{{  __("Hi there!") }}</x-slot>

    @forelse($posts as $post)
        <x-post-teaser :post="$post"/>
    @empty
        No posts found.
    @endforelse
</x-guest-layout>

