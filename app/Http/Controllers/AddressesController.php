<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressesRequest;
use App\Http\Requests\UpdateAddressesRequest;
use App\Http\Resources\AddressesResource;
use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // $customer = Auth::user(); 
        // $customerId = $customer->id;
        $customerId = 3;
        $addresses = Addresses::where([['status', true],['customer_id',$customerId]])->with('customer')->get();

        // Transform each branch using AddressesResource
        $transformedaddresses = AddressesResource::collection($addresses);
    
        return $transformedaddresses;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressesRequest $request)
    {
        try{
            // $customerId = Auth::user()->id; 
           
            $customerId = 3;
            $validatedData = $request->validated();
    
            $validatedData['customer_id'] = $customerId;
            $validatedData['coordinates'] = json_encode($validatedData['coordinates']);
            $addresses = Addresses::create($validatedData);
           
            return new AddressesResource($addresses);
        } catch(\Exception $e){
            // \Log::error($e->getMessage());
            return response()->json(['error'=>['message'=> 'failed to store new address']], 500);
        }
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
    public function update(UpdateAddressesRequest $request, string $addressId)
    {
        $incommingData = $request->validated();
        try{
            // $customerId = Auth::user()->id; 
           
            $customerId = 3;
            $address = Addresses::find($addressId);
            if($address->customer_id != $customerId){
                return response()->json(['error'=>['message'=> 'This address does not belong to you, Bitch!']],404);
            }
            $address->update($incommingData);

            return response()->json(['success'=>['message'=> 'Address updated successfully.']],200);
            // return new AddressesResource($address);          
        }catch(\Exception $e){
            // \Log::info( $e->getMessage());
            return response()->json(['error'=>['message'=> 'Failed to update the address.']], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
