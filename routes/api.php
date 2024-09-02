<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PedidoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'v1',
], function () {
    Route::group([
        'prefix' => 'cuenta',
    ], function () {
        Route::get('/{email}', [CuentaController::class, 'get']);
        Route::post('/', [CuentaController::class, 'create']);
        Route::delete('/{cuenta}', [CuentaController::class, 'delete']);
        Route::put('/', [CuentaController::class, 'update']);
    });

    Route::group([
        'prefix' => 'pedido',
    ], function () {
        Route::get('/{pedido}', [PedidoController::class, 'get']);
        Route::post('/', [PedidoController::class, 'create']);
        Route::delete('/{pedido}', [PedidoController::class, 'delete']);
        Route::patch('/{pedido}', [PedidoController::class, 'update']);
    });
});


