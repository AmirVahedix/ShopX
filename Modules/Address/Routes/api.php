<?php


use Illuminate\Support\Facades\Route;
use Modules\Address\Http\Controllers\Api\AddressController;

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('/profile/addresses', [AddressController::class, 'index']);
    });
