<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories (GET /categories )
     */
    public function index()
    {
        return response()->json(['data' => Category::all()], 200);
    }

    /**
     * Display the specified resource. (GET  /categories/{$id})
     */
    public function show(Category $category)
    {  
        return response()->json(['data' => $category], 200);
    }

}
