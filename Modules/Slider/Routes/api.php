<?php

use Illuminate\Support\Facades\Route;
use Modules\Slider\Http\Controllers\Api\SliderController;

Route::get('/sliders', [SliderController::class, 'index']);
