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
        //:end-bindings:
    }
}
