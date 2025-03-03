<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimony>
 */
class TestimonyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->name(),
            'image'=>"https://www.shutterstock.com/shutterstock/photos/1551008000/display_1500/stock-photo-rack-with-bright-clothes-on-light-background-rainbow-colors-1551008000.jpg",
            'content'=>$this->faker->paragraph(1),
        ];
    }
}
