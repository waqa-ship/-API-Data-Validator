<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('categories' , CategoryController::class);
Route::resource('subcategories' , SubCategoryController::class);
Route::resource('posts' , PostController::class);
Route::get('/api/posts/check/{id}', [PostController::class, 'checkRecord']);



// Route::get('/contegories', [CategoryController::class, 'index']);
// Route::get('/contegories/{id}', [CategoryController::class, 'show']);
// Route::post('/contegories', [CategoryController::class, 'store']);
// Route::put('/contegories/{id}', [CategoryController::class, 'update']);
// Route::delete('/contegories/{id}', [CategoryController::class, 'destroy']);