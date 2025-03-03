<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Testimony;
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

        $testimonies = Testimony::limit(5)->get();

        $properties = Product::limit(6)->get();

        return view('index', compact('agents', 'subCategories', 'category', 'testimonies', 'properties'));
    }
}
