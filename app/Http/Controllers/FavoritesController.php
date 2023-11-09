<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Customers;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{ 
            // $customer = Auth::user()->customer;
            $customerId = 3;
            $customer = Customers::find($customerId);

            if(!$customer){
                return response()->json(['error'=>['message'=> 'customer not found']], 404);
            }

            $favorites = json_decode($customer->favorites);

            //for a detailed information we coulde use this portion below
            // $data = [];
            // foreach($favorites as $favorite){
            //     $food = Foods::find($favorite);
            //     if(!$food){ 
            //         return response()->json(['error'=>['message'=> 'food not found']],404);
            //     }
            //     $data[] = new FoodResource($food);
            // }
            return response()->json(['data'=>$favorites],200);
        }catch(\Exception $e){
            return response()->json(['error'=>['message'=> $e->getMessage()]],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foodId'=> 'required|integer|exists:foods,id',
        ]);

        $foodId = $validatedData['foodId'];

        try{ 
            // $customer = Auth::user()->customer;
            $customerId = 3;
            $customer = Customers::find($customerId);

            if(!$customer){
                return response()->json(['error'=>['message'=> 'customer not found']], 404);
            }

            $favorites = json_decode($customer->favorites);
            if(in_array($foodId, $favorites)){
                $favorites = array_diff($favorites, [$foodId]); // Remove the foodId from favorites
                $customer->favorites = json_encode(array_values($favorites)); // Re-index the array
                $customer->save();
                return response()->json(['data' => $favorites], 200);
            }
            
            $favorites[] = $foodId;
            $customer->favorites = json_encode($favorites);
            $customer->save();
            return response()->json(['data'=>$favorites],200);
         
        }catch(\Exception $e){
            return response()->json(['error'=>['message'=> $e->getMessage()]],500);
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
