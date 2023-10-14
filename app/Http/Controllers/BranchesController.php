<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchesRequest;
use App\Http\Requests\UpdateBranchesRequest;

class BranchesController extends Controller
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
    public function store(StoreBranchesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Branches $branches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branches $branches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchesRequest $request, Branches $branches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branches $branches)
    {
        //
    }
}
