<?php

namespace App\Providers;

use App\Interfaces\ProductoRepositoryInterface;
use App\Repositories\ProductoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductoRepositoryInterface::class, ProductoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
