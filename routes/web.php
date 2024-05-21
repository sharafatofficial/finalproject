<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


// front routes/
// // Route::get('/', function () {
// //     return view('frontend.index');
// });
Route::get('/',[IndexController::class,'index']);
Route::get('/cat_detail/{id}',[IndexController::class,'cat_detail']);
Route::get('/tag_detail/{id}',[IndexController::class,'tag_detail']);
// ---------------------------------------------


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
    Route::get('add_post', [PostController::class, 'add_post'])->name('add_post');
    Route::post('store_post', [PostController::class, 'store']);
    Route::get('view_post', [PostController::class, 'view'])->name('post_list');
    Route::get('post_delete/{id}', [PostController::class, 'delete']);
    Route::get('post_update/{id}', [PostController::class, 'edit']);
    Route::post('update_post/{id}', [PostController::class, 'update']);

    Route::get('add_cat', function(){
        return view('backend.category.category_add');
    });
    Route::post('store_cat', [CategoryController::class, 'store_cat']);
    Route::get('cat_list', [CategoryController::class, 'view_cat'])->name('cat_list');
    Route::get('cat_delete/{id}', [CategoryController::class, 'delete']);
    Route::get('cat_update/{id}', [CategoryController::class, 'edit']);
    Route::post('update_cat/{id}', [CategoryController::class, 'update']);

    Route::get('add_tag', function(){
        return view('backend.tag.tag_add');
    });
    Route::post('store_tag', [TagController::class, 'store_tag']);
    Route::get('tag_list', [TagController::class, 'view_tag'])->name('tag_list');
    Route::get('tag_delete/{id}', [TagController::class, 'delete']);
    Route::get('tag_update/{id}', [TagController::class, 'edit']);
    Route::post('update_tag/{id}', [TagController::class, 'update']);
 

});

