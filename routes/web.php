<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');

    Route::get('/login', [LoginController::class, 'login'])->name('login.form');
    Route::post('/login', [LoginController::class, 'logar'])->name('login');

    Route::get('/forget-password', [PasswordResetController::class, 'request'])->name('password.request');
    Route::post('/forget-password', [PasswordResetController::class, 'email'])->name('password.email');

    Route::get('/reset-password', [PasswordResetController::class, 'reset'])->name('password.reset');
    Route::post('/reset-update', [PasswordResetController::class, 'update'])->name('password.update');
});


Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
