<div class="">
    <div>{{ $post->title }}</div>
    <div>{!! $teaser !!}</div>
    <div><a href="{{ route('posts.show', $post->slug) }}">Read more...</a></div>
    <div>{{ $createdAt  }}</div>
</div>
