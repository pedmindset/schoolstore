<?php

namespace App\Http\Controllers;

use App\Traits\CartTrait;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use CartTrait;

    public function store(Request $request)
    {
        $this->addToProductCart($request->id, 1);
        return back();
    }
    
    public function addToCart(int $id)
    {
        $this->addProductToCart($id, 1);
        return back();
    }
    
    public function addToCartApi(Request $request)
    {
        $this->addProductToCart($request->product_id, 1);

        return response()->json([
            "message" => "Product has been added to cart!",
        ], 200);
    }

    public function removeFromCartApi(Request $request)
    {
        $this->removeProductFromCart($request->row_id);

        return response()->json([
            "message" => "Product has been removed from cart!",
        ], 200);
    }

    public function removeFromCart($rowId)
    {
        $this->removeProductFromCart($rowId);
        return back();
    }
}
