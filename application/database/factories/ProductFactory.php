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
    public function definition()
    {
        $image = [
            'products/paket-advance.png',
            'products/paket-desktop.png',
            'products/paket-lifestyle.png',
            'products/standard_repo.png',
        ];
        return [
            'name' => $this->faker->unique()->word(rand(1, 4), true),
            'description' => $this->faker->sentence(rand(4, 10)),
            'price' => $this->faker->numberBetween(50000, 100000),
            'category_id' => rand(1, 10),
            'image' => $image[rand(0, 3)]
        ];
    }
}
