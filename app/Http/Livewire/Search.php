<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use MeiliSearch\Endpoints\Indexes;

class Search extends Component
{

    public Collection $posts;
    public string $query = '';
    public bool $showResults = false;

    public function mount(): void
    {
        $this->posts = collect();
    }

    public function updatedQuery(): void
    {
        if (! trim($this->query)) {
            $this->posts = collect();
            return;
        }

        $this->searchPosts();

        $this->showResults = true;
    }

    public function render(): View
    {
        return view('livewire.search');
    }

    private function searchPosts(): void
    {
        $posts = Post::search($this->query, function (Indexes $indexes, $query) {
            return $indexes->search($query, [
                'attributesToHighlight' => ['title', 'excerpt'],
                'attributesToRetrieve' => ['id', 'title', 'excerpt', 'slug'],
                'limit' => 5
            ]);
        })
            ->raw();

        $this->formatPosts($posts);

    }

    private function formatPosts($posts)
    {
        $this->posts = collect($posts)
            ->only('hits')
            ->flatten(1)
            ->pluck('_formatted');
    }

}
