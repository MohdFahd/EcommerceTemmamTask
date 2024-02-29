<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Slug;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a Slug instance or retrieve an existing one

        return [
            'name' => $this->faker->name(),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat modi amet ducimus fugit assumenda? Quibusdam omnis consectetur non nihil corrupti dicta repellat quae voluptas, ea, libero, similique accusantium asperiores nam.',
            'img' => 'assets/images/icons/coat.svg',
            'slug' => $this->faker->randomElement(['sports', 'Tech']),
        ];
    }
}
