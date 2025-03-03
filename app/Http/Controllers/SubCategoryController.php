<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function getSubCategory(string $category, string $subCategory)
    {
        $subCategory = SubCategory::
            select('sub_categories.name as name', 'sub_categories.slug as slug', 'sub_categories.image as image')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->where([
                ['sub_categories.slug', '=', $subCategory], ['categories.slug', '=', $category]
            ])
            ->first();

        return view('sub-category', ['subCategory'=>$subCategory, 'category'=>$category]);
    }
}
