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
        $parentCategoryID = Category::query()->inRandomOrder()->pluck('id')->first();
        $num = rand(1, 15);
        $img = '/assets/images/Factory/icons/'.$num.'.svg';

        return [
            'name' => $this->faker->name(),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat modi amet ducimus fugit assumenda? Quibusdam omnis consectetur non nihil corrupti dicta repellat quae voluptas, ea, libero, similique accusantium asperiores nam.',
            'img' => $img,
            'parent_id' => $parentCategoryID ?: null, // Assign a random parent category ID if available, otherwise assign null // Assign a random parent category ID
        ];
    }
}
