<?php

namespace App\Http\Controllers;

use App\Models\FoodsRating;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodsRatingRequest;
use App\Http\Requests\UpdateFoodsRatingRequest;
use Illuminate\Support\Facades\Auth;

class FoodsRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodsRatingRequest $request)
    {
        // $customerId = Auth::user()->id;
        $customerId = 3;
        $incomingData = $request->validated();

        try{
            // Check if the customer has already rated the food
            $existingRating = FoodsRating::where('customer_id', $customerId)
            ->where('food_id', $incomingData['food_id']) 
            ->first();

            if ($existingRating) {
                // Update the existing rating
                $rating = FoodsRating::find($existingRating->id);
                $rating->update($incomingData);
                return response()->json('Rating updated successfully', 200);
            }

            // If no existing rating, proceed to store the new rating
            $incomingData = array_merge($incomingData, ['customer_id' => $customerId]);
            FoodsRating::create($incomingData);
            return response()->json('Rating stored successfully',201);
        }catch(\Exception $e){
            return response()->json(['error'=>['message'=>'Something went wrong rating food.']], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(FoodsRating $foodsRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodsRating $foodsRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodsRatingRequest $request, FoodsRating $foodsRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodsRating $foodsRating)
    {
        //
    }
}
