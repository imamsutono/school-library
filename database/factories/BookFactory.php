<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => fake()->numberBetween(1, 100),
            'title' => fake()->sentence(),
            'isbn'  => fake()->numerify('#############'),
            'publisher' => fake()->sentence(),
            'cover' => fake()->imageUrl()
        ];
    }
}
