<?php

use App\Http\Controllers\api\user\AuthController;
use App\Http\Controllers\api\user\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(AuthController::class)->prefix('user')->group(function(){
     Route::post('login', 'login');
});

Route::middleware('auth:api')->group(function(){
    Route::controller(OrderController::class)->prefix('user')->group(function(){
        Route::post('orders', 'store');
    });
});

Route::middleware('auth:api')->get('/test-token', function () {
    return response()->json(['message' => 'Token is valid!']);
});
