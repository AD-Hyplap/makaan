<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class CategorySeeder extends Seeder
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
            'image' => 'property.jpg',
        ]);

        $propertySubCategories = ['Appartment', 'Villa', 'Home', 'Office', 'Building', 'Townhouse', 'Shop', 'Garage'];

        foreach ($propertySubCategories as $subCategoryName) {
            $subCategory = SubCategory::create([
                'name' => $subCategoryName,
                'slug' => strtolower($subCategoryName),
                'image' => 'https://www.shutterstock.com/shutterstock/photos/1551008000/display_1500/stock-photo-rack-with-bright-clothes-on-light-background-rainbow-colors-1551008000.jpg',
                'category_id' => $propertyCategory->id,
            ]);

            // Create random products for each property subcategory
            Product::factory()->count(random_int(4, 10))->create([
                'category_id' => $propertyCategory->id,
                'subcategory_id' => $subCategory->id,
            ]);
        }

        // Generate other random categories
        $randomCategories = Category::factory()->count(1)->create();

        foreach ($randomCategories as $category) {
            $subCategories = SubCategory::factory()->count(random_int(4, 10))->create([
                'category_id' => $category->id,
            ]);

            // Generate random products for each subcategory
            foreach ($subCategories as $subCategory) {
                Product::factory()->count(random_int(4, 10))->create([
                    'category_id' => $category->id,
                    'subcategory_id' => $subCategory->id,
                ]);
            }
        }
    }
}
