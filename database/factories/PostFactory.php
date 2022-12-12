<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $status = $this->faker->randomElement(['draft', 'published']);
        return [
            'title'         => $this->faker->unique()->sentence(),
            'slug'          => $this->faker->slug(),
            'status'        => $status,
            'excerpt'       => $this->faker->realText(50),
            'body'          => $this->faker->text(),
            'image_path'    => $this->faker->imageUrl(),
            'min_to_read'   => $this->faker->numberBetween(1, 10),
            'is_published'  => ( $status === 'published' ) ? 1 : 0,
            'user_id'       => User::factory(1)->create()->first()->id
        ];
    }
}
