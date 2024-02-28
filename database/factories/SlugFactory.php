<?php

namespace Database\Factories;

use App\Models\Slug;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            // You can add more fields if needed
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Slug $slug) {
            // Optionally define any additional actions after creating the slug
        });
    }
}
