<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function ($router) {
    Route::group(['prefix' => 'auth','as'=>'auth.'], function ($router) {
        Route::post('register', [AuthController::class,'register'])->name('register');
        Route::post('registerAdmin', [AuthController::class,'registerAdmin'])->name('registerAdmin');

        Route::post('login', [AuthController::class,'login'])->name('login');
        Route::post('loginAdmin', [AuthController::class,'loginAdmin'])->name('loginAdmin');

        Route::post('logout', [AuthController::class,'logout'])->name('logout');
        Route::post('refresh', [AuthController::class,'refresh'])->name('refresh');
        Route::post('me', [AuthController::class,'me'])->name('me');
    });
    Route::group(['prefix'=>'products','as'=>'product.'],function (){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::post('/store',[ProductController::class,'store'])->name('store');
    });
});
