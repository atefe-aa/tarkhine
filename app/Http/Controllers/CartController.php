<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Customers;
use App\Models\Foods;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $customerId)
    {
        $customer = Customers::find($customerId);
        if(!$customer) return response(['error'=>'Customer not found.'], 404);
        if(!$customer->cart) return response(['message'=>'Cart is empty.'], 200);

        $cart = json_decode($customer['cart']);
        $cartData = [];
        foreach($cart as $foodId => $count){
            $cartData[] = [
               'food'=> new FoodResource(Foods::find($foodId)),
                'count' => $count
            ];
        }
      
        return response(['data'=>$cartData], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $customerId)
    {
        $customer = Customers::find($customerId);
        if(!$customer) return response(['error'=>'Customer not found.'], 404);

        $incomingData = $request->validate([
            'foodId'=>'required',
            'count'=>'required|integer'
        ]);

        $cart = (array)json_decode($customer->cart);

        if($incomingData['count'] === 0){
            if(isset($cart[ $incomingData['foodId']])) {
                unset($cart[ $incomingData['foodId']]);
            }else{
                return response(['error'=> 'Count must be at least 1.'], 400);
            }
        }else{
            $cart[ $incomingData['foodId'] ] =  $incomingData['count'];
        }
                    
        try{
            $customer->cart = json_encode($cart);
            $customer->save();
            return response(['message'=> 'cart updated successfully'], 200);
        }catch(\Exception $e){
            return response(['error'=> $e->getMessage()], 400);
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
    public function update(Request $request, string $customerId, string $foodId)
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
