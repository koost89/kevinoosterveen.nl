<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

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
        if (! trim($this->query) || Str::length($this->query) < 3) {
            $this->posts = collect();
            return;
        }

        $this->posts = Post::search($this->query)
            ->take(5)
            ->get();

        $this->showResults = true;
    }

    public function render()
    {
        return view('livewire.search');
    }

}
