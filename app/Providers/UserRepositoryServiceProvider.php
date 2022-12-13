<?php

namespace App\Providers;

use App\ImplRepository\UserRepositoryImpl;
use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepositoryInterface;

class UserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepositoryImpl::class);
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
