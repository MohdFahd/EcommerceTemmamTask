<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'category_id' => $this->faker->numberBetween(1, 10),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'img' => $this->faker->imageUrl(),
            'new_price' => $this->faker->numberBetween(100, 1000),
            'old_price' => $this->faker->numberBetween(100, 1000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['1', '0']),
        ];
    }
}
