<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $post = Post::factory(1)->create()->first();

        return [
            "email"         => $this->faker->unique()->safeEmail(),
            "message"       => $this->faker->realText(50),
            'likes'         => $this->faker->numberBetween(500, 100000),
            'reply_count'   => $this->faker->numberBetween(0, 500),
            'replied_date'  => $this->faker->dateTimeThisDecade(),
            'posts_id'      => $post->id
        ];
    }
}
