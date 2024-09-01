<?php

namespace App\Providers;

use App\Repositories\Cuenta\CuentaRepository;
use App\Repositories\Cuenta\CuentaRepositoryInterface;
use App\Repositories\Pedido\PedidoRepository;
use App\Repositories\Pedido\PedidoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CuentaRepositoryInterface::class, CuentaRepository::class);
        $this->app->bind(PedidoRepositoryInterface::class, PedidoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
