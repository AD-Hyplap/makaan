<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
class TestimonyController extends Controller
{
    public function index(Request $request){
        $testimonies = Testimony::all();
        return view('testimonies', compact('testimonies'));
    }
}
