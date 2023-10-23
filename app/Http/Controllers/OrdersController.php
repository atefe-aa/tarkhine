<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Resources\FoodResource;
use App\Models\Branches;
use App\Models\Customers;
use App\Models\Foods;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

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
        // $customerId = Auth::user()->id; 
        $customerId = 1; 

        try{
            $data['cart'] = json_encode($data['cart']);
            $data['code'] = random_int(100000,999999);
            $data['customer_id'] = $customerId;

            $order = Orders::create($data);

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
        $customer = Customers::find($id);
        if(!$customer){ 
            return response(['error'=> 'Customer not found.'],404);
        }

        try{
             $orders = Orders::where('customer_id', $customer->id)->get();
            if($orders->isEmpty()){
                return response(['message'=> 'No order exists.'],200 );
            }

            $transformedOrdes = [];
            foreach( $orders as $order){
                $branch = Branches::find($order['branch_id']);
                if(!$branch) return  response(['error'=> 'Branch not found.'],404);

                $orderData = $order->toArray();
                unset($orderData['branch_id']);

                $orderData['branchName'] = $branch->name;
                $cart = json_decode($orderData['cart']);

                $cartData = [];
                foreach($cart as $foodId => $count){
                    $food = Foods::find($foodId);
                    if(!$food) return response(['error'=> 'food not found'],404);
                    $cartData[] = [
                    'food'=> new FoodResource($food),
                        'count' => $count
                    ];
                }

                $orderData['cart'] = $cartData;
                $transformedOrdes[] = $orderData;
            }
           

            return response(['data'=>$transformedOrdes],200);
        }catch(\Exception $e){
            return response(['error'=>$e->getMessage()],500);
        }
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
