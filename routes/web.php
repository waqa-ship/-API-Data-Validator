<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [UserController::class, 'index']);
Route::post('/add-user', [UserController::class, 'store'])->name('add-user');
Route::get('users/id', [UserController::class, 'show']);
Route::put('users/id', [UserController::class, 'update']);
Route::delete('users/id', [UserController::class, 'destroy']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/users/store', [UserController::class, 'store']);
// Route::get('/users/update/{id}', [UserController::class, 'update']);
// Route::get('/users/delete/', [UserController::class, 'destroy']);

Route::get('/dynamic-form', [FormController::class, 'index']);







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
