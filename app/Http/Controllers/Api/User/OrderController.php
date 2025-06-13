<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Exception;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'order_no' => 'required|string|unique:orders,order_no',
                'batch_no' => 'required|string',
                'core_brand' => 'required|string',
                'box_brand' => 'required|string',
                'end_tag' => 'required|string',

                'order_items' => 'required|array|min:1',
                'order_items.*.size' => 'required|string',
                'order_items.*.meter' => 'required|string',
                'order_items.*.micron' => 'required|string',
                'order_items.*.color' => 'required|string',
                'order_items.*.qty' => 'required|string',
                'order_items.*.rate' => 'required|string',
            ]);

            if ($validate->fails()) {
                return response()->json($validate->errors(), 422);
            }

            $user = Auth::user();
           
            $order = Order::create([
                'user_id' => $user->id,
                'order_no' => $request->order_no,
                'batch_no' => $request->batch_no,
                'core_brand' => $request->core_brand,
                'box_brand' => $request->box_brand,
                'end_tag' => $request->end_tag
            ]);

            foreach($request->order_items as $item)
            {
                $order->items()->create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'size' => $item['size'],
                    'meter' => $item['meter'],
                    'micron' => $item['micron'],
                    'color' => $item['color'],
                    'qty' => $item['qty'],
                    'rate' => $item['rate']
                ]);
            }

            if($order)
            {
                return response()->json([
                    'status' => true,
                    'message' => 'Order Created Successfully.',
                    'data' => $order->load('items'),
                ], 201);
            }
        } catch (Exception $e) {
            return response()->json([
              'status' => false,
              'errors' => $e->getMessage(),
            ]);
        }
    }

    public function assignToProductManager(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'assigned_to_product_manager' => 'required|exists:users,name'
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors());
        }

        $order =Order::find($request->order_id);
        $order->assigned_to_product_manager = $request->assigned_to_product_manager;
        $order->save();

        if($order)
        {
            return response()->json([
                'status' => true,
                'message' => 'Order assigned to Product Manager successfully.',
                'data' => $order
            ]);
        }
    }
  
    public function orderdetails($id)
    {
      try{
       $order = Order::with('items')->where('id', $id)->first();
        if(!$order)
        {
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found.'
            ], 404);
        }
        return response()->json([
                'status' => true,
                'order' => $order
            ], 200);

      } catch(Exception $e){
         return response()->json([
            'status' => false,
            'errors' => $e->getMessage(),
         ], 500);
      }      
    }

    public function productManager()
    {
        $productManager = User::where('role', 'Product Manager')->get(); 

        if($productManager->isEmpty())
        {
            return response()->json([
                'status' => false,
                'message' => 'No Product Managers found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'users' => $productManager
        ], 200);
    }

    public function totalOrder()
    {
        try{
            $orders = Order::with('items')->get();

            return response()->json([
                'status' => true,
                'orders' => $orders,
            ], 200);
        }catch(Exception $e){
          return response()->json([
            'status' => false,
            'error' => $e->getMessage()
          ], 401);
        }
    }

    public function complateOrder()
    {
        try{
            $orders = Order::where('status', 'complete')->get();
            return response()->json([
                'status' => true,
                'orders' => $orders
            ], 200);
        }catch(Exception $e){
          return response()->json([
            'status' => false,
            'error' => $e->getMessage(),
          ], 401);
        }
    }

    public function pendingOrder() {
        try{
            $orders = Order::where('status', 'pending')->get();
            return response()->json([
                'status' => true,
                'orders' => $orders
            ], 200);
        }catch(Exception $e){
          return response()->json([
            'status' => false,
            'error' => $e->getMessage(),
          ], 401);
        }
    }
}
