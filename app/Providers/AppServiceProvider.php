<?php

namespace App\Providers;

use App\Models\Kost;
use App\Observers\KostObserver;
use Illuminate\Support\ServiceProvider;
use App\Repository\KamarRepositoryInterface;
use App\Repository\OrderRepositoryInterface;
use App\Repository\KostRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\KamarRepositoryImpl;
use App\Repository\OrderRepositoryImpl;
use App\Repository\KostRepositoryImpl;
use App\Repository\UserRepositoryImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $models = array(
            'KamarRepository',
            'KostRepository',
            'OrderRepository',
            'UserRepository'
        );

        foreach ($models as $model) {
            $this->app->bind("App\Repository\\{$model}Interface", "App\ImplRepository\\{$model}Impl");
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Kost::observe(KostObserver::class);
    }
}
