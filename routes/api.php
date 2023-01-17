<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserAuthenticationController;
use App\Http\Controllers\API\Category\CategoryController;
use App\Http\Controllers\API\Attribute\{ColorController,SizeController};
use App\Http\Controllers\API\Product\ProductController;


Route::post('login', [UserAuthenticationController::class, 'login']);
Route::post('registration', [UserAuthenticationController::class, 'registration']);
Route::get('product-list',[ProductController::class,'index']);
Route::get('product-show',[ProductController::class,'show']);
Route::group(['middleware' => ['jwt.verify','auth:api']],function(){
    Route::options('category',[CategoryController::class, 'category']);
    Route::options('size',[SizeController::class, 'size']);
    Route::options('color',[ColorController::class,'color']);
    Route::post('product-store',[ProductController::class,'store']);
    Route::get('product-edit',[ProductController::class,'edit']);
});
