<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressesResource;
use App\Models\Addresses;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     //
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
    public function show(string $customerId)
    {
        // $customer = Auth::user(); 
        // $customerId = $customer->id;
        $addresses = Addresses::where([['status', true],['customer_id',$customerId]])->with('customer')->get();

        // Transform each branch using AddressesResource
        $transformedaddresses = AddressesResource::collection($addresses);
    
        return $transformedaddresses;
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
