<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// All paths for create, update, delete, show, index routes in PostController
Route::resource('/posts', PostController::class);