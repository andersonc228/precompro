<?php

namespace App\Providers;

use App\Repositories\CuentaRepository;
use App\Repositories\CuentaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CuentaRepositoryInterface::class, CuentaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
