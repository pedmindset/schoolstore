<?php

namespace App\Traits;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

trait CartTrait
{

    public function addProductToCart($id, $qty)
    {
        // Get product
        $product = Product::find($id);

        // check if item already existed in cart
        $alreadyInCartProduct = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id == $product->id;
        });

        // If it exists then update the quantity by 1
        if (count($alreadyInCartProduct) > 0) {
            $cartItem = $alreadyInCartProduct->first();
            Cart::update($cartItem->rowId, $cartItem->qty++);
        }
        Cart::add($product, $qty, []);
    }

    public function removeProductFromCart($rowId)
    {
        Cart::remove($rowId);
    }
}
