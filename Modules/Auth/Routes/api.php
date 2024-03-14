<?php


use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Api\AuthController;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/auth/verify', [AuthController::class, 'verify']);
