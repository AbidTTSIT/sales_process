<?php

use App\Http\Controllers\api\user\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->prefix('user')->group(function(){
     Route::post('login', 'login');
});