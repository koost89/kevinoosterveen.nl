<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\Search;
use Livewire\Livewire;
use Livewire\Testing\TestableLivewire;
use Tests\TestCase;

class SearchTest extends TestCase
{

    public function testItCanRenderTheView()
    {
        Livewire::test(Search::class)
            ->assertSee("No results");
    }

    public function testItShowsTheFoundPosts()
    {
        $this->createSinglePostLivewireSearch()
            ->assertSeeInOrder([
                'Test',
                'Laravel test',
            ]);
    }

    public function testItLinksToTheCorrectPost()
    {
        $this->createSinglePostLivewireSearch()
        ->assertSeeHtml('href="' . route('posts.show', 'test') . "");
    }

    private function createSinglePostLivewireSearch(): TestableLivewire
    {
        return Livewire::test(Search::class)
            ->set('posts', collect([
                [
                    'id' => 1,
                    'slug' => 'test',
                    'excerpt' => "Laravel test",
                    'title' => "Test",
                ]
            ]));
    }
}
