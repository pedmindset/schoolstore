<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home(Request $request)
    {
        return view('shop.home');
    }

    public function categories(Request $request)
    {
        return view('shop.categories');
    }

    public function products(Request $request)
    {
        $products = Product::get();
        $category = ProductCategory::whereSlug($request->category)->first();
        return view('shop.products', compact('products', 'category'));
    }
}
