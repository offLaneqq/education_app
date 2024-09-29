<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Group with middleware for auth user. ONLY AUTH USER CAN DO THAT
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->can('update', 'post')->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

    // Using middleware and 'can'
    // Route::get('/admin', function () {
    //     return 'You are logged as admin';
    // })->middleware('can:is-admin')->name('admin');

    // Using gate from ProviderService
    Route::get('/admin', [AdminController::class, 'index'])->middleware('is-admin')->name('admin');
});

// Group without middleware. Everyone can see all post and open the post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Test connect custom middleware 'can-view-post' for show function 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Group with middlewate for guest. ONLY GUEST CAN REGISTER OR LOGIN
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginUserController::class, 'login'])->name('login');
    Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
});





