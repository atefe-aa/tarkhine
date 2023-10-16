<?php

namespace App\Http\Controllers;

use App\Models\FoodsRating;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodsRatingRequest;
use App\Http\Requests\UpdateFoodsRatingRequest;

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
        //
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
