<?php

namespace App\Http\Controllers;

use App\Models\CategoryType;
use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{
    public function index()
    {
        $categoryTypes = CategoryType::all();
        return response()->json($categoryTypes);
    }
}
