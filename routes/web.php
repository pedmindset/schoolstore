<?php

use Illuminate\Http\Request;
use App\Models\NewsletterContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accounts', function () {
    return view('accounts.index');
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
