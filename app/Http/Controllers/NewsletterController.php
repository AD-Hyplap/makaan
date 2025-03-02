<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){
        $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ]);

        Newsletter::create($request->all());
        return back()->with('success', 'You have subscribed successfully');
    }
}
