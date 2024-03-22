<?php


use Illuminate\Support\Facades\Route;
use Modules\Address\Http\Controllers\Api\AddressController;

Route::middleware('auth:sanctum')
    ->prefix('/profile/addresses')
    ->group(function () {
        Route::get('/', [AddressController::class, 'index']);
        Route::post('/', [AddressController::class, 'store']);
        Route::get('/{id}', [AddressController::class, 'show']);
        Route::patch('/{id}', [AddressController::class, 'update']);
        Route::delete('/{id}', [AddressController::class, 'delete']);
        Route::patch('/{id}/default', [AddressController::class, 'setAsDefault']);
    });
