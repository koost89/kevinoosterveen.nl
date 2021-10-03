<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
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

}
