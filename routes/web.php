<?php

use App\Models\Hostel;
use App\Models\School;
use Illuminate\Http\Request;
use App\Models\ThirdPartyAccess;
use App\Models\NewsletterContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

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

// Non-Authenticated Routes
Auth::routes();

// Authenticated Routes
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', 'ShopController@home')->name('shop.home');

        Route::get('/cart', 'ShopController@cart')->name('shop.cart');
        Route::get('/checkout', 'ShopController@checkout')->name('shop.checkout');

        Route::get('/shop/order-success/{uuid}', 'ShopController@orderSuccess')->name('shop.order-success');

        Route::post('add-to-cart-api', 'CartController@addToCartApi')->name('shop.add-to-cart-api');
        Route::post('remove-from-cart-api', 'CartController@removeFromCartApi')->name('shop.add-from-cart-api');

        Route::get('/dashboard', 'CustomersController@dashboard')->name('customer.dashboard');
        Route::post('/update-profile', 'CustomersController@updateProfile')->name('customer.update-profile');
        Route::post('/update-momo', 'CustomersController@updateMomo')->name('customer.update-momo');
        Route::post('/create-guarantor', 'CustomersController@createGuarantor')->name('customer.create-guarantor');
        Route::post('/update-guarantor', 'CustomersController@updateGuarantor')->name('customer.update-guarantor');
        Route::get('/delete-guarantor/{id}', 'CustomersController@deleteGuarantor')->name('customer.delete-guarantor');
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('login'));
    })->name('logout');
});






Route::get('/test', function () {
    dd(Storage::exists('categories/Alcoholic Drink.jpg'));
});
Route::get('/', 'ShopController@home')->name('shop.home')->middleware('guest');
Route::get('shop/categories', 'ShopController@categories')->name('shop.categories');
Route::get('shop/products', 'ShopController@products')->name('shop.products');
Route::get('shop/product/{slug}', 'ShopController@product')->name('shop.product');

Route::get('/user/schools', function(){
    $schools = School::where('school_category_id', auth()->user()->profile->school_category_id)->get(['id', 'name']);

    return response()->json($schools);
});

Route::post('/user/upload/picture', function(Request $request){
    $profile = auth()->user()->profile;

    $validateData = $request->validate([
        'profile_picture' => 'required|mimes:jpg,jpeg,png|max:3000'
    ]);

    $profile->clearMediaCollection('profile');

    $profile->addMedia($request->profile_picture->path())
    ->usingName(auth()->user()->name . ' Profile Picture')
    ->toMediaCollection('profile');

    return response()->json([
        'status' => 'success'
    ]);
});

Route::post('/user/upload/identification', function(Request $request){
    $profile = auth()->user()->profile;

    $validateData = $request->validate([
        'attachment' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
    ]);

    $profile->addMedia($request->attachment->path())
    ->usingName(auth()->user()->name . ' Student Identification')
    ->toMediaCollection('attachments');

    return response()->json([
        'status' => 'success'
    ]);
});

Route::get('/user/hostels/{schoo_id}', function($school_id){
    $schools = Hostel::where('school_id', $school_id)->get(['id', 'name']);

    return response()->json($schools);
});

Route::post('/user/schools', function(Request $request){
    $validateData = $request->validate([
        'school' => 'required|integer',
        'hostel' => 'required|integer',
        'level' => 'nullable',
        'room' => 'nullable',
    ]);

    $profile = auth()->user()->profile;

    if($request->filled('school')){
        $profile->school_id = $request->school;
    };

    if($request->filled('hostel')){
        $profile->hostel_id = $request->hostel;
    };

    if($request->filled('level')){
        $profile->level = $request->level;
    };

    if($request->filled('room')){
        $profile->room = $request->room;
    };

    $profile->save();

    return response()->json([
        'status' => 'success'
    ]);
});

Route::post('grantaccess/', function(Request $request){

    $validatedData = $request->validate([

    ]);

    // ['user_id', 'name', 'agent', 'last_login', 'session', 'code', 'url', 'created_at', 'updated_at'];


    $url = URL::temporarySignedRoute(
        'grantaccess', now()->addDays(2), ['user' => auth()->user()->id]
    );

    $access = ThirdPartyAccess::create([
        'user_id' => auth()->user()->id,
        'name' => $request->name,
        'code' => substr(unique_code(), 0, 5),
        'url' => $url,
        'expired' =>  now()->addDays(2),
    ]);

    Session::flash('success', 'Access Granted Successfully!');
    return redirect('shop/dashboard#access');

})->middleware('auth');

Route::get('/grantaccess/{user}', function (Request $request) {
    
})->name('grantaccess')->middleware('signed');

// Route::get('/shop/home', function () {
//     return view('shop.index');
// });

// Route::get('/shop/shop', function () {
//     return view('shop.shop');
// });

// Route::get('/shop/product', function () {
//     return view('shop.product');
// });

// Route::get('/shop/collections/{slug}', function () {
//     return view('shop.collection_products');
// });

// Route::get('/shop/brands/{slug}', function () {
//     return view('shop.brand_products');
// });

// Route::get('/shop/categories/{slug}', function () {
//     return view('shop.category_products');
// });

// Route::get('/shop/collections/', function () {
//     return view('shop.collections');
// });

// Route::get('/shop/brands/', function () {
//     return view('shop.brands');
// });


// Route::get('/shop/cart/', function () {
//     return view('shop.cart');
// });

// Route::get('/shop/wishlist/', function () {
//     return view('shop.wishlist');
// });

// Route::get('/shop/checkout/', function () {
//     return view('shop.checkout');
// });

// Route::get('/shop/dashboard/', function () {
//     return view('customers.dashboard');
// });


// Route::get('/shop/accounts/', function () {
//     return view('customers.account');
// });

Route::post('/newsletters/signup', function (Request $request) {
    if ($request->filled('email')) {
        $newsletterContact = NewsletterContact::where('email', $request->email)->first();
        if (!$newsletterContact) {
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


// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/shop', function () {
//     return view('commingsoon');
// })->name('shop');
