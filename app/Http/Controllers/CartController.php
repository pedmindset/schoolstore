<?php

namespace App\Http\Controllers;

use App\Traits\CartTrait;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use CartTrait;

    public function store(Request $request)
    {
        $this->addToCart($request->id, 1);
        return back();
    }
    
    public function addToCart(int $id)
    {
        $this->addToCart($id, 1);
        return back();
    }

    public function removeFromCart($rowId)
    {
        $this->removeFromCart($rowId);
        return back();
    }
}
