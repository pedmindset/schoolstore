<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('product_categories')) {
            $productCategories = ProductCategory::orderBy('name', 'asc')->withCount('products')->get();
            View::share('productCategories', $productCategories);
        }

    }
}
