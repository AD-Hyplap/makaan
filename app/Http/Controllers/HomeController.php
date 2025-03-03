<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $agents = Agent::inRandomOrder()->limit(4)->get();
        $category = "property";

        $subCategories = SubCategory::select('sub_categories.name as name', DB::raw('count(products.id) as property_count'), 'sub_categories.slug as slug')
            ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
            ->join('products', 'sub_categories.id', '=', 'products.subcategory_id')
            ->groupBy('sub_categories.name','sub_categories.id', 'sub_categories.slug')
            ->where('categories.name', $category)
            ->get();

        foreach($subCategories as $subCategory){
            logger($subCategory->slug);
        }

        return view('index', compact('agents', 'subCategories', 'category'));
    }
    
}
