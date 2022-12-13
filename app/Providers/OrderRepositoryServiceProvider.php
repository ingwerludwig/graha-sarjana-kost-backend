<?php

namespace App\Providers;

use App\ImplRepository\OrderRepositoryImpl;
use Illuminate\Support\ServiceProvider;
use App\Repository\OrderRepositoryInterface;

class OrderRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
