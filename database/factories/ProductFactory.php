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
        $num = rand(1, 44);
        $img = '/assets/images/Factory/products/'.$num.'.jpg';

        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1, 8),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'img' => $img,
            'new_price' => $this->faker->numberBetween(50, 300),
            'old_price' => $this->faker->numberBetween(300, 500),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement([1, 0]),
        ];
    }
}
