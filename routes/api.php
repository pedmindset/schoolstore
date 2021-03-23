<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace("API")->group(function () {
    // Unauthenticated Route
    Route::namespace("Auth")->group(function () {
        Route::post("login", "LoginController@login");
    });

    // Authenticated Routes
    Route::middleware("auth:sanctum")->group(function () {
        Route::apiResource("delivery-schedules", "DeliveryScheduleController")->only("index");
        Route::post("delivery-schedules/confirm", "DeliveryScheduleController@confirm");
        
        Route::apiResource("products", "ProductController")->only("index");
        Route::apiResource("product-categories", "ProductCategoryController")->only("index");
    });
});
