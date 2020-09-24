<?php

use Illuminate\Http\Request;
use App\Models\NewsletterContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    dd(Storage::exists('categories/Alcoholic Drink.jpg'));
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop/home', function () {
    return view('shop.index');
});

Route::get('/shop/shop', function () {
    return view('shop.shop');
});

Route::get('/shop/product', function () {
    return view('shop.product');
});

Route::get('/shop/collections/{slug}', function () {
    return view('shop.collection_products');
});

Route::get('/shop/brands/{slug}', function () {
    return view('shop.brand_products');
});

Route::get('/shop/categories/{slug}', function () {
    return view('shop.category_products');
});

Route::get('/shop/collections/', function () {
    return view('shop.collections');
});

Route::get('/shop/categories/', function () {
    return view('shop.categories');
});

Route::get('/shop/brands/', function () {
    return view('shop.brands');
});

Route::get('/shop/ordersuccess/', function () {
    return view('shop.order_success');
});

Route::get('/shop/cart/', function () {
    return view('shop.cart');
});

Route::get('/shop/wishlist/', function () {
    return view('shop.wishlist');
});

Route::get('/shop/checkout/', function () {
    return view('shop.checkout');
});

Route::get('/shop/dashboard/', function () {
    return view('customers.dashboard');
});


Route::get('/shop/accounts/', function () {
    return view('customers.account');
});

Route::post('/newsletters/signup', function(Request $request){
    if($request->filled('email')){
        $newsletterContact = NewsletterContact::where('email', $request->email)->first();
        if(!$newsletterContact){
            NewsletterContact::create([
                'email' => $request->email,
                'ipAddress' => $request->ip()
            ]);

            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'info',
            'message' => 'We already have your contact',
        ])->setStatusCode(401);

    };

    return response()->json([
        'status' => 'error',
        'message' => 'Error Occured Try Again',
    ])->setStatusCode(401);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', function(){
    return view('commingsoon');
})->name('shop');
