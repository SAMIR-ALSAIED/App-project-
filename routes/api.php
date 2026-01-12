<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\CategoryController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');

// catgorey

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class,'index']);
        Route::post('/', [CategoryController::class,'store']);
        Route::delete('/{id}', [CategoryController::class,'destroy']);


    });



    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class,'index']);
        Route::post('/', [ProductController::class,'store']);
        Route::post('/{id}', [ProductController::class,'update']);
    Route::delete('/{id}', [ProductController::class,'destroy']);


    });
