<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;

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
        Route::get('/client/{email}', [CuentaController::class, 'get']);
        Route::post('/client', [CuentaController::class, 'create']);
        Route::delete('/client/{cuenta}', [CuentaController::class, 'delete']);
        Route::put('/client', [CuentaController::class, 'update']);
    });
});


