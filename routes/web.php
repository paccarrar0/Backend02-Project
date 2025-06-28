<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('authenticate');

