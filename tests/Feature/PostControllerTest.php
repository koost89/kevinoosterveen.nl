<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanAccessThePostsPage()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function testItCanShowPosts()
    {
        $post = Post::factory()->published()->create();

        $this->get('/')
            ->assertSeeText($post->title);
    }

    public function testItOnlyShowsPublishedPosts()
    {
        $post = Post::factory()->create();

        $this->get('/')
            ->assertDontSeeText($post->title);
    }

    public function testItCanFilterByTag()
    {
        $tag = Tag::factory()->create();

        $post = Post::factory()->published()->hasAttached($tag)->create();
        $anotherPost = Post::factory()->published()->create();

        $this->get("/?tag=$tag->name")
            ->assertSeeText($post->title)
            ->assertDontSeeText($anotherPost->title);
    }

    public function testItCanFilterByPostTitle()
    {
        $post = Post::factory(['title' => 'This is a test'])->published()->create();
        $anotherPost = Post::factory()->published()->create();

        $this->get("/?q=This is a test")
            ->assertSeeText($post->title)
            ->assertDontSeeText($anotherPost->title);
    }

}
