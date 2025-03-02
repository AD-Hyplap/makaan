<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
class AgentController extends Controller
{
    public function index(Request $request){
        $agents = Agent::all();
        return view('agents', compact('agents'));
    }
}
