<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchesRequest;
use App\Http\Requests\UpdateBranchesRequest;
use App\Http\Resources\BranchesResource;
use Exception;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $branches = Branches::where('status', 'active')->get();

        // Transform each branch using BranchesResource
        $transformedBranches = BranchesResource::collection($branches);
    
        return $transformedBranches;
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
        $data = $request->validated();
        try{
            $data['cordinates'] = json_encode($data['cordinates']);
            $data['pictures'] = json_encode($data['pictures']);
            $branch = new Branches();
            $branch->fill($data);
            $branch->save();
            return  response()->json(['success'=> "Branch stored successfully"],201);
        }
        catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()],400);
        }
    }

    /**
     * Display the specified resource.
     */ 
    public function show(string $brancheId)
    {

       $branche = Branches::find($brancheId);
        if(!$branche){
            return response()->json(['error' => 'branch not found'], 404);
        }
        try{
        return new BranchesResource($branche);
    } catch (Exception $e) {
       
        return response()->json(['error' => 'An error occurred while fetching the guest'], 500);
    }
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
