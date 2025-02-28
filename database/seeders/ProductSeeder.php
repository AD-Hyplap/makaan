<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the "Property" category explicitly
        $propertyCategory = Category::create([
            'name' => 'Property',
            'slug' => 'property',
            'image' => 'property.jpg', // Change as needed
        ]);

        // Define the subcategories for "Property"
        $propertySubCategories = ['Appartment', 'Villa', 'Home', 'Office', 'Building', 'Townhouse', 'Shop', 'Garage'];

        foreach ($propertySubCategories as $subCategoryName) {
            $subCategory = SubCategory::create([
                'name' => $subCategoryName,
                'slug' => strtolower($subCategoryName),
                'category_id' => $propertyCategory->id,
            ]);

            // Create random products for each property subcategory
            Product::factory()->count(5)->create([
                'category_id' => $propertyCategory->id,
                'sub_category_id' => $subCategory->id,
            ]);
        }

        // Generate other random categories
        $randomCategories = Category::factory()->count(9)->create();

        foreach ($randomCategories as $category) {
            $subCategories = SubCategory::factory()->count(5)->create([
                'category_id' => $category->id,
            ]);

            // Generate random products for each subcategory
            foreach ($subCategories as $subCategory) {
                Product::factory()->count(3)->create([
                    'category_id' => $category->id,
                    'sub_category_id' => $subCategory->id,
                ]);
            }
        }
    }
}
