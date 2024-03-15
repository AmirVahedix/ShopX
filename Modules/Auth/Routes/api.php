<?php


use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Api\AuthController;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/auth/verify', [AuthController::class, 'verify']);

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::post('/auth/logout', [AuthController::class, 'logout']);
    });
