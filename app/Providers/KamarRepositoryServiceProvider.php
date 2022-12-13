<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ImplRepository\KamarRepositoryImpl;
use App\Repository\KamarRepositoryInterface;

class KamarRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KamarRepositoryInterface::class, KamarRepositoryImpl::class);
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
