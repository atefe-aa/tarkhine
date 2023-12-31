<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Customers;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customer = Auth::user(); 
        $customerId = 3;
        $customer = Customers::find($customerId);
        if(!$customer->cart) return response(['message'=>'Cart is empty.'], 200);

        $cart = json_decode($customer['cart']);

        //for more datails of the foods we can use the code below instead.
        // $cartData = [];
        // foreach($cart as $foodId => $count){
        //     $food = Foods::find($foodId);
        //     if(!$food) return response(['error'=> 'food not found'],404);
        //     $cartData[] = [
        //        'food'=> new FoodResource($food),
        //         'count' => $count
        //     ];
        // }
      
        // return response(['data'=>$cartData], 200);
        return response(['data'=>$cart], 200);
    }
    
    public function show()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $customer = Auth::user(); 
        $customerId = 3;
        $customer = Customers::find($customerId);

        $incomingData = $request->validate([
            'foodId'=>'required',
            'count'=>'required|integer'
        ]);

        $food = Foods::find($incomingData['foodId']);
        if(!$food) return response(['error'=> 'food not found'], 404);

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
     * Remove the specified resource from storage.
     */
    public function empty(string $customerId)
    {
        // $customer = Auth::user(); 
        $customer = Customers::find($customerId);

        try{
            $customer->update(['cart'=> null]);
            return response(['message'=> 'cart is emty now.'], 200);
        }catch(\Exception $e){

        return response(['error'=> $e->getMessage()], 400);
        }
    }
}
