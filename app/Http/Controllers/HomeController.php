<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function home(){
        $agents = Agent::inRandomOrder()->limit(4)->get();
        $category = "property";
        $subCategories = SubCategory::where('name', $category)->get();

        return view('index', compact('agents', 'subCategories', 'category'));
    }
}
