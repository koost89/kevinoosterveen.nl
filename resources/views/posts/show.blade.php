<x-guest-layout>
    <div class="space-y-6">
        <h1 class="text-2xl font-bold">{{ $post->title }}</h1>

        <p class="text-sm">{{ $post->excerpt }}</p>

        <div class>{{ \Illuminate\Mail\Markdown::parse($post->text) }}</div>
    </div>
</x-guest-layout>

