<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['type','user'])->get();
        return response()->json($categories);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_type_id' => 'required|exists:category_types,id',
        ]);

        $userId = $request->user()->id; // get currently authenticated user

        $validated['created_by'] = $userId;

        $category = Category::create($validated);

        return response()->json($category, 201);
    }

    public function categoryById($id)
    {
        $category = Category::with(['type'])->findOrFail($id);
        return response()->json($category);
    }
}
