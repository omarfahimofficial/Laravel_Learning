<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/posts',[RegisterController::class, 'posts'])->name('posts');
Route::get('/register',[RegisterController::class, 'registration'])->name('registration');
Route::post('/register',[RegisterController::class, 'store']);


Route::get('/', function () {
    return view('dashboard');
});
