<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrdersRequest;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
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
    public function store(StoreOrdersRequest $request)
    {
        $data = $request->validated();

        try{
            $order = Orders::create([
                "address_id"=>$data['address_id'],
                "foods"=>json_encode($data['foods']),
                "total_price"=>$data['total_price'],
                "foods_discount"=>$data['foods_discount'],
                "delivery_cost"=>$data['delivery_cost'],
                "delivery_type"=>$data['delivery_type'],
                "payment_method"=>$data['payment_method'],
                "description"=>$data['description'],
                "code"=>random_int(100000,999999)
            ]);

            return response(['data'=>$order], 201);
        }catch(\Exception $e){
            return response(['error'=>$e->getMessage()],500);
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
