<?php


use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\Api\OrderController;

Route::prefix('/profile/orders')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{sku}', [OrderController::class, 'show']);
    });
