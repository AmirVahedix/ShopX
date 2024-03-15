<?php

use Illuminate\Support\Facades\Route;
use Modules\Bookmark\Http\Controllers\Api\BookmarkController;


Route::middleware('auth:sanctum')
    ->prefix('/profile/bookmarks')
    ->group(function () {
        Route::get('/', [BookmarkController::class, 'index']);
        Route::post('/{product_id}', [BookmarkController::class, 'store']);
        Route::delete('/{product_id}', [BookmarkController::class, 'delete']);
    });
