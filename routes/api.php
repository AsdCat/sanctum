<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//publick route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('products',ProductController::class)->only(['index','show']);



//protected route
Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('products',ProductController::class)->except(['index','show']);
});

