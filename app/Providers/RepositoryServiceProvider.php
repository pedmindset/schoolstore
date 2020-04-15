<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProfileRepository::class, \App\Repositories\ProfileRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CustomerRepository::class, \App\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SchoolCategoryRepository::class, \App\Repositories\SchoolCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SchoolRepository::class, \App\Repositories\SchoolRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BillingInformationRepository::class, \App\Repositories\BillingInformationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PaymentMethodRepository::class, \App\Repositories\PaymentMethodRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AccountRepository::class, \App\Repositories\AccountRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TransactionRepository::class, \App\Repositories\TransactionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ReceiptRepository::class, \App\Repositories\ReceiptRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductCategoryRepository::class, \App\Repositories\ProductCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OrderRepository::class, \App\Repositories\OrderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WishlistRepository::class, \App\Repositories\WishlistRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CartRepository::class, \App\Repositories\CartRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CollectionRepository::class, \App\Repositories\CollectionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsletterContactRepository::class, \App\Repositories\NewsletterContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactRepository::class, \App\Repositories\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VehicleRepository::class, \App\Repositories\VehicleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DriverRepository::class, \App\Repositories\DriverRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TrackingRepository::class, \App\Repositories\TrackingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CustomerDefaultRepository::class, \App\Repositories\CustomerDefaultRepositoryEloquent::class);
        //:end-bindings:
    }
}
