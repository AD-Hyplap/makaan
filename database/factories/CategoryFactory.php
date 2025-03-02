<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

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
        do {
            $name = fake()->unique()->word();
            $slug = Str::slug($name);

            // Check if the slug already exists in the database
            $exists = Category::where('slug', $slug)->exists();
            if ($exists) {
                $slug .= '-' . Str::random(5); // Append random string if duplicate
            }
        } while ($exists); // Repeat until we get a unique slug

        $name= fake()->word();
        return [
            'name'=> $name,
            'image'=>"https://www.shutterstock.com/shutterstock/photos/1551008000/display_1500/stock-photo-rack-with-bright-clothes-on-light-background-rainbow-colors-1551008000.jpg",
            'slug' => $slug,
        ];
    }
}
