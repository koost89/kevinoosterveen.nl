<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanCreateANewPost()
    {
        Post::factory()->create();

        $this->assertDatabaseCount('posts', 1);
    }

    public function testItCanAttachATag()
    {
        Post::factory()->hasAttached(Tag::factory()->count(4))->create();

        $this->assertDatabaseCount('posts', 1);
        $this->assertDatabaseCount('tags', 4);
        $this->assertDatabaseHas('taggables', [
            "taggable_type" => "post",
            "taggable_id" => "1",
        ]);
    }
}
