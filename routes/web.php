<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::controller(AuthController::class)->prefix('admin')->group(function () {
    Route::get('login', 'index')->name('admin.login'); 
    Route::post('login', 'login')->name('login');      
    Route::post('logout', 'logout')->name('admin.logout'); 
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('admin.dashboard'); 

        Route::get('add', 'adminForm')->name('admin');
        Route::post('admin', 'admin')->name('admin.post');
        Route::get('list', 'adminList')->name('all.admin');

        Route::get('product_manager/add', 'productManager')->name('product.manager');
        Route::post('product/manager', 'productManagerPost')->name('product.manager.post');
        Route::get('product/manager/list', 'productManagerList')->name('all.product.manager');

        Route::get('machine/operator', 'machineOperator')->name('machine.operator');
        Route::post('machine/operator', 'machineOperatorPost')->name('machine.operator.post');
        Route::get('machine/operator/list', 'machineOperatorList')->name('all.machine.operator');

        Route::get('dispatch', 'dispatch')->name('dispatch');
        Route::post('dispatch', 'dispatchPost')->name('dispatch.post');
        Route::get('dispatch/list', 'dispatchList')->name('all.dispatch');
    });
    
    Route::controller(RoleController::class)->prefix('admin')->group(function(){
        Route::get('role', 'index')->name('role');
        
    });
});


