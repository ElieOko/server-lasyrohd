<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::resource('cities', CityController::class)->only(['index', 'show','edit','store']);

Route::middleware(['auth:sanctum'])->group(function () {
    
});
