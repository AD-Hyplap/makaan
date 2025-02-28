<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function getSubCategory(string $subCategory, string $category)
    {

        $subCategory = SubCategory::
            join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->where([
                ['slug', '=', $subCategory], ['categories.slug', '=', $category]
            ])->first();

        return view('sub-category', ['subCategory'=>$subCategory, 'category'=>$subCategory->category]);
    }
}
