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
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 999999),
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'area' => $this->faker->randomDigit(800, 1200),
            'bedroom' => $this->faker->randomDigit(0, 5),
            'bathroom' => $this->faker->randomDigit(0, 5),
        ];
    }
}
