<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Categories;
use App\Models\Foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function foodsByCategory($categoryId)
    {
        // Find the category by its ID
        $category = Categories::find($categoryId);
    
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    
        return new FoodResource(Foods::whereJsonContains('categories', $categoryId)->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
