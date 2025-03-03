<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\SubCategory;
use App\Models\Testimony;

class HomeController extends Controller
{
    public function home(){
        $agents = Agent::inRandomOrder()->limit(4)->get();
        $category = "property";
        $subCategories = SubCategory::where('name', $category)->get();

        return view('index', compact('agents', 'subCategories', 'category'));
    }
    
    // public function testimony()
    // {
    //     $testimonies = Testimony::latest()->get();
    //     return view('index', compact('testimonies'));
    // }
}
