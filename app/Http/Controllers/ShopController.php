<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::whereFeatured('yes')->limit(5)->get();
        $newProducts = Product::latest()->limit(8)->get();
        $bestSellingProducts = Product::withCount('order_products')->orderBy('order_products_count', 'desc')->limit(8)->get();
        return view('shop.home', compact('featuredProducts', 'newProducts', 'bestSellingProducts'));
    }

    public function categories()
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
        $featuredProducts = Product::whereFeatured('yes')->limit(6)->get();
        $product = Product::whereSlug($slug)->first();
        if(empty($slug) || $product == null){
            abort(404);
        }
        $relatedProducts = Product::whereProductCategoryId($product->product_category_id)
        ->where('id', '!=', $product->id)
        ->limit(6)->get();
        return view('shop.product', compact('product', 'featuredProducts', 'relatedProducts'));
    }
}
