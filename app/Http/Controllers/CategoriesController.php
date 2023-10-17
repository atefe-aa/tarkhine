<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Models\Categories;
use Illuminate\Http\Request;
use OpenApi\Examples\PetstoreSwaggerIo\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }  
    
    /**
     * Display a listing of the main categories like: mainDish, dessert etc..
     */
    public function showMainCategories()
    {
        return new CategoriesResource(Categories::where([['parent', null],['status',1]])->get());
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
