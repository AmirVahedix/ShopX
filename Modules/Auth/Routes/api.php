<?php


use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Api\AuthController;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/verify', [AuthController::class, 'verify']);
