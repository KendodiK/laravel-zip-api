<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user/login', [UsersController::class, 'login']);

Route::get('/city/all', [CityController::class, 'index']);
Route::get('/city/{id}', [CityController::class, 'show']);
Route::post('/city', [CityController::class, 'store'])->middleware('auth:sanctum');
Route::put('/city/{id}', [CityController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/city/{id}', [CityController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/county/all', [CountyController::class, 'index']);
Route::get('/county/{id}', [CountyController::class, 'show']);
Route::post('/county', [CountyController::class, 'store']);
Route::put('/county/{id}', [CountyController::class, 'update']);
Route::delete('/county/{id}', [CountyController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
