<?php

use Illuminate\Support\Facades\Route;
use Modules\Brand\Http\Controllers\Api\BrandController;

Route::get('/brands/featuring', [BrandController::class, 'featuring']);
