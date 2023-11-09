<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchesResource;
use App\Http\Resources\FoodResource;
use App\Models\Branches;
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
        return FoodResource::collection(Foods::with('rating')->get());
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
        $food = Foods::find($id);

        if (!$food) {
            return response()->json(['error' => 'food not found'], 404);
        }
    
        return new FoodResource($food);
    }

    public function menu($branchId){
        if($branchId){
            $branch = Branches::find($branchId);

            if (!$branch) {
                return response()->json(['error' => 'branch not found'], 404);
            }
        
            return FoodResource::collection(Foods::where('branch_id', $branchId)->with('rating')->get());
        }
    }


    public function popularMenu( $branchId){
        $branch = Branches::find($branchId);

        if (!$branch) {
            return response()->json(['error' => 'branch not found'], 404);
        }

        $topRatedFoods = Foods::where('branch_id', $branchId)
        ->with('rating')
        ->get()
        ->sortByDesc(function($food) {
            return $food->rating->avg('rating');
        })
        ->take(5);

        return FoodResource::collection($topRatedFoods);
    }

    public function recommendedMenu( $branchId){
        $branch = Branches::find($branchId);

        if (!$branch) {
            return response()->json(['error' => 'branch not found'], 404);
        }
    
        return FoodResource::collection(Foods::where([['branch_id', $branchId],['recommended',true]])->with('rating')->get());
    }

    public function foodsByCategory(Request $request ,$branchId)
    {

        $categoryId = $request->categoryId;

        $branch = Branches::find($branchId);

        if (!$branch) {
            return response()->json(['error' => 'branch not found'], 404);
        }

        // Find the category by its ID
        $category = Categories::find($categoryId);
    
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    
        return FoodResource::collection(Foods::where('branch_id',$branchId)
        ->whereJsonContains('categories', [$categoryId])
        ->with('rating')
        ->get());
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
