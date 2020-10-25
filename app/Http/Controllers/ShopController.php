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
        $featuredProducts = Product::whereFeatured('yes')->limit(6)->get();
        $category = ProductCategory::whereSlug($request->category)->first();
        $products = Product::when(!empty($request->category), function($query) use ($category){
            $query->where('product_category_id', $category->id);
        })->paginate(25);
        return view('shop.products', compact('products', 'category', 'featuredProducts'));
    }

    public function product(string $slug)
    {
        if(empty($slug)){
            abort(404);
        }
        $product = Product::whereSlug($slug)->first();
        return view('shop.product', compact('product'));
    }
}
