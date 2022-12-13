<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ImplRepository\KostRepositoryImpl;
use App\Repository\KostRepositoryInterface;

class KostRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KostRepositoryInterface::class, KostRepositoryImpl::class);
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
