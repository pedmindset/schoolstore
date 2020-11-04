<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CheckoutPageLivewire extends Component
{
    protected $listeners = [
        'updateCart' => 'updateCart',
    ];

    public function render()
    {
        return view('livewire.checkout-page');
    }

    public function updateCart()
    {
    }

    public function placeOrder()
    {
        if(sizeof(Cart::content()) == 0){
            Session::flash('error', 'Cart is empty');
            return;
        }
        try {
            DB::beginTransaction();

            $order = new Order();
            $order->user_id = auth()->id();
            $order->amount = Cart::total();
            $order->save();


            $products = [];

            foreach (Cart::content() as $product) {
                $p = new OrderProduct();
                $p->product_id = $product->id;
                $p->price = $product->price;
                $p->quantity = $product->qty;

                $products[] = $p;
            }
            $order->products()->saveMany($products);

            Cart::destroy();


            DB::commit();



            return redirect(route('shop.order-success', $order->uuid));
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $e->getMessage());
            // // return back();
            // dd($e);
        }
    }
}
