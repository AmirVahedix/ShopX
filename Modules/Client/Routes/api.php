<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\Api\ClientController;

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('/profile', [ClientController::class, 'show']);
        Route::patch('/profile', [ClientController::class, 'update']);
    });
