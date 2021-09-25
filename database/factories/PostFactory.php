<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $title = $this->faker->words(5, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'text' => $this->faker->text(4000),
        ];
    }
}
