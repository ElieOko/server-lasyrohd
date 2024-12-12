<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\TrackProjectController;

Route::resource('cities', CityController::class)->only(['index','show','edit','store']);
Route::resource('tools', ToolController::class)->only(['index','show','edit','store']);
Route::resource('events', EventController::class)->only(['index','show','edit','store']);
Route::resource('type_events', TypeEventController::class)->only(['index','show','edit','store']);
Route::resource('partenaires', PartenaireController::class)->only(['index','show','edit','store']);
Route::resource('projects', ProjectController::class)->only(['index','show','edit','store']);
Route::resource('project.tracks', TrackProjectController::class)->only(['index','show','edit','store']);
Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    
});
