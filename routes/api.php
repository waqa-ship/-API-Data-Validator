<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignboardController;
use App\Http\Controllers\BannerController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories' , CategoryController::class);
Route::resource('subcategories' , SubCategoryController::class);
Route::resource('posts' , PostController::class);
// Route::resource('sign_boards', SignBoardController::class);


Route::apiResource('signboards', SignBoardController::class);
Route::apiResource('banner', BannerController::class);






// Route::apiResource('signboards', SignBoardController::class);
// Route::get('/get-signboards/{id}', [SignBoardController::class, 'show']);





// Route::get('/contegories', [CategoryController::class, 'index']);
// Route::get('/contegories/{id}', [CategoryController::class, 'show']);
// Route::post('/contegories', [CategoryController::class, 'store']);
// Route::put('/contegories/{id}', [CategoryController::class, 'update']);
// Route::delete('/contegories/{id}', [CategoryController::class, 'destroy']);