<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/pages/home', [PageController::class, 'home']);

Route::get('/test', function () {
    $data = \Modules\Address\Models\Zone::query()->with('estates')->get();

    return response()->json($data);
});
