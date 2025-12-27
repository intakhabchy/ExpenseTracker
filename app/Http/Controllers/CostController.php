<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::with('wallet','category')->get();
        return response()->json($costs);
    }
}
