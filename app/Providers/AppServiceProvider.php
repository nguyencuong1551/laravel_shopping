<?php

namespace App\Providers;

use App\Repository\Bill\BillEloquentRepository;
use App\Repository\Bill\BillRepositoryInterface;
use App\Repository\Product\ProductEloquentRepository;
use App\Repository\Product\ProductRepositoryInterface;
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
        //đăng kí để laravel hiểu ProductRepositoryInterface là của ProductEloquentRepository
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductEloquentRepository::class
        );
        $this->app->singleton(
            BillRepositoryInterface::class,
            BillEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255);
    }
}
