<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// All paths for create, update, delete, show, index routes in PostController
Route::resource('/posts', PostController::class);

Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [LoginUserController::class, 'login'])->name('login');
Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');