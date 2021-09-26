<?php

namespace App\View\Components\Post;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;

class TeaserView extends Component
{
    public function __construct(public Post $post) {}

    public function render(): View
    {
        return view('components.post.teaser-view');
    }

    public function teaser(): string
    {
        return Str::markdown(Str::limit($this->post->text), [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
    }

    public function createdAt(): string
    {
        return Str::lower($this->post->created_at->format('d F Y'));
    }
}
