<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'auth_login']);

Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'create_user']);
Route::get('verify/{token}', [AuthController::class, 'verify']);

Route::get('forget_password/', [AuthController::class, 'forget']);
Route::post('forget_password/', [AuthController::class, 'forget_password']);

Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'reset_password']);

Route::get('logout', [AuthController::class, 'logout']);




Route::group(['middleware', 'adminuser'], function () {
   
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('add_post', [DashboardController::class, 'add_post'])->name('add_post');
    Route::post('store_post', [PostController::class, 'store']);
    Route::get('view_post', [PostController::class, 'view']);



});

