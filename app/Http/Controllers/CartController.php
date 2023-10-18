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
    public function store(Request $request)
    {
        //
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
