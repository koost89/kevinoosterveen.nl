<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;
use MeiliSearch\Endpoints\Indexes;

class Search extends Component
{

    public string $query = '';
    public bool $showResults = false;
    public Collection $posts;

    public function mount()
    {
        $this->posts = collect();
    }

    public function updatedQuery()
    {
        if (! trim($this->query)) {
            $this->posts = collect();
            return;
        }

        $this->searchPosts();

        $this->showResults = true;
    }

    public function render()
    {
        return view('livewire.search');
    }

    private function searchPosts(): void
    {
        $posts = Post::search($this->query, function (Indexes $indexes, $query, $options) {
            return $indexes->search($query, [
                'attributesToHighlight' => ['title', 'excerpt'],
                'limit' => 5
            ]);
        })
            ->raw();

        $this->posts = collect($posts)
            ->only('hits')
            ->flatten(1)
            ->pluck('_formatted')
            ->map(fn ($fields) => ['id' => $fields['id'], 'title' => $fields['title'], 'excerpt' => $fields['excerpt']]);

    }

}
