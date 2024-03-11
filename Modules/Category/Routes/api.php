<?php


use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\Api\CategoryController;

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{slug}', [CategoryController::class, 'show']);
