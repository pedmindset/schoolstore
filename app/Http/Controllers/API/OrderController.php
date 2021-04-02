<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $model = Order::class;
    protected $modelResource = OrderResource::class;

    public function index()
    {
        $data = $this->model::latest()->owned()->paged();
        return $this->modelResource::collection($data);
    }

    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();

            $order = $this->model::create([
                "user_id" => auth()->id(),
                "amount" => $request->total,
            ]);


            $products = [];
            foreach ($request->cart_content as $product) {
                $p = new OrderProduct([
                    "product_id" => $product["id"],
                    "price" => $product["price"],
                    "quantity" => $product["qty"],
                ]);
                $products[] = $p;
            }
            $order->products()->saveMany($products);


            DB::commit();

            Transaction::create([
                'user_id' => auth()->user()->id,
                'transaction_id' => unique_code(),
                'amount' => $request->total,
                'type' => 'checkout',
                'method' => 'wallet',
            ]);

            return $this->apiSuccess("Order has been placed successfully!", 200, new $this->modelResource($order));
        } catch (\Exception $e) {
            DB::rollback();
            logger($e);
            return $this->apiError("Sorry, something went wrong", 500);
        }
    }
}
