<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat modi amet ducimus fugit assumenda? Quibusdam omnis consectetur non nihil corrupti dicta repellat quae voluptas, ea, libero, similique accusantium asperiores nam.',
            'img' => 'assets/images/icons/coat.svg',
        ];
    }
}
