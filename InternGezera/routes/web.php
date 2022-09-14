<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


Route::group(['as'=>'auth.'],function (){
    Route::get('login', array(AuthController::class,'loginPage'))->name('loginPage');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::post('logout',[AuthController::class,'logout'])->name('logout')->middleware('dashboard');
});


Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['dashboard','emailVerified']],function(){
    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::group(['as'=>'client.','prefix' => 'clients','middleware' => ['role:admin']],function (){
        Route::get('index',[ClientController::class,'index'])->name('index');
        Route::get('create',[ClientController::class,'create'])->name('create');
        Route::post('store',[ClientController::class,'store'])->name('store');
        Route::get('edit/{id}',[ClientController::class,'edit'])->name('edit');
        Route::put('update',[ClientController::class,'update'])->name('update');
        Route::delete('delete',[ClientController::class,'delete'])->name('delete');
    });

    Route::group(['as'=>'product.','prefix' => 'products','middleware' => ['role:admin']],function (){
        Route::get('index',[ProductController::class,'index'])->name('index');
        Route::get('create',[ProductController::class,'create'])->name('create');
        Route::post('store',[ProductController::class,'store'])->name('store');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::put('update',[ProductController::class,'update'])->name('update');
        Route::delete('delete',[ProductController::class,'delete'])->name('delete');
        Route::get('export',[ProductController::class,'export'])->name('export');
    });

});

