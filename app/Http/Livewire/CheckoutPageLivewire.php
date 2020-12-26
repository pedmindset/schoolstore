<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Account;
use Livewire\Component;
use App\Models\OrderProduct;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        $account = Account::where('user_id', auth()->user()->id)->first();
        if($account){
            if($account->balance >=  Cart::total()){
                //pass
            }else{
                $balance = number_format($account->balance, 2);
                Session::flash('error', "Your Balance: $balance, Not enough balance to proceed");
                return;
            }
        }else{
            $account = Account::create([
                'user_id' => auth()->user()->id,
                'name' => 'wallet',
                'balance' => 0,
                'credit' => 0,
                'limit' => 0,
            ]);
            $balance = number_format($account->balance, 2);
            Session::flash('error', "Your Balance: $balance, Not enough balance to proceed");
            return;
        }
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

            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'transaction_id' => unique_code(),
                'amount' => Cart::total(),
                'type' => 'checkout',
                'method' => 'wallet',
            ]);

            return redirect(route('shop.order-success', $order->uuid));
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $e->getMessage());
            // // return back();
            // dd($e);
        }
    }
}
