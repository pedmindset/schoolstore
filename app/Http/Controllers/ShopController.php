<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::whereFeatured('yes')->inRandomOrder()->limit(10)->get();
        $newProducts = Product::latest()->limit(10)->get();
        $bestSellingProducts = Product::withCount('order_products')->orderBy('order_products_count', 'desc')->inRandomOrder()->limit(10)->get();
        return view('shop.home', compact('featuredProducts', 'newProducts', 'bestSellingProducts'));
    }

    public function categories()
    {
        return view('shop.categories');
    }

    public function products(Request $request)
    {
        $featuredProducts = Product::whereFeatured('yes')->inRandomOrder()->limit(6)->get();
        $category = ProductCategory::whereSlug($request->category)->first();
        $products = Product::when(!empty($request->category), function ($query) use ($category) {
            $query->where('product_category_id', $category->id);
        })->inRandomOrder()->paginate(20);
        return view('shop.products', compact('products', 'category', 'featuredProducts'));
    }

    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (empty($slug) || $product == null) {
            abort(404);
        }

        $featuredProducts = Product::whereFeatured('yes')->inRandomOrder()->limit(6)->get();

        $relatedProducts = Product::whereProductCategoryId($product->product_category_id)
            ->where('id', '!=', $product->id)
            ->limit(6)->get();

            // return $product;

        return view('shop.product', compact('product', 'featuredProducts', 'relatedProducts'));
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function checkout()
    {
        $user = auth()->user();

        return view('shop.checkout', [
            "user" => $user,
        ]);
    }

    public function orderSuccess(Request $request, $uuid)
    {
        if ($uuid == null) {
            abort(404);
        }
        $order = Order::whereUserId(auth()->id())->where('uuid', $uuid)->first();
        if ($order == null) {
            abort(404);
        }
        return view('shop.order_success', [
            "order" => $order,
        ]);
    }
}
