<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'post_id' => fake()->numberBetween($min = 1, $max = 22),
            'author' => fake()->name(),
            'content' => fake()->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
