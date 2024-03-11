<?php


use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Api\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/special_offer', [ProductController::class, 'specialOffers']);
Route::get('/products/best_seller', [ProductController::class, 'bestSellers']);
Route::get('/products/{slug}', [ProductController::class, 'show']);
