<?php


use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Api\ProductController;

Route::get('/products', [ProductController::class, 'index']);
