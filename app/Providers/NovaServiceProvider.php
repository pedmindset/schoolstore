<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            // new Help,
            (new \App\Nova\Metrics\NewUsers)->width('1/4'),
            (new \App\Nova\Metrics\NewSchools)->width('1/4'),
            (new \App\Nova\Metrics\NewCustomers)->width('1/4'),
            (new \App\Nova\Metrics\CustomersPerWeek)->width('1/4'),
            (new \App\Nova\Metrics\NewOrders)->width('1/4'),
            (new \App\Nova\Metrics\Orders)->width('1/4'),
            (new \App\Nova\Metrics\WeeklyOrders)->width('1/4'),
            (new \App\Nova\Metrics\OrderPerMonth)->width('1/4'),
            (new \App\Nova\Metrics\OrderStatus)->width('1/4'),
            (new \App\Nova\Metrics\NewCustomerDefaults)->width('1/4'),
            (new \App\Nova\Metrics\CustomerDefaults)->width('1/4'),
            (new \App\Nova\Metrics\NewProducts)->width('1/4'),
            (new \App\Nova\Metrics\NewTransactions)->width('1/4'),
            (new \App\Nova\Metrics\Transactions)->width('1/4'),
            (new \App\Nova\Metrics\WeeklyTransactions)->width('1/4'),
            (new \App\Nova\Metrics\TransactionsStatus)->width('1/4'),
            (new \App\Nova\Metrics\Contacts)->width('1/4'),
            (new \App\Nova\Metrics\NewsLetterContacts)->width('1/4'),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
            new \Cloudstudio\ResourceGenerator\ResourceGenerator(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
