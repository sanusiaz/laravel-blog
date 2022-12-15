<?php
use Illuminate\Support\Facades\Route;

// Login Routes
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])
    ->name('auth.index');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])
    ->name('auth.create');

// register routes 
Route::get('register', [\App\Http\Controllers\Auth\LoginController::class, 'register'])
    ->name('auth.register');
Route::post('register', [\App\Http\Controllers\Auth\LoginController::class, 'store'])
    ->name('auth.store');

// forget password route
Route::get('/forget_password', [\App\Http\Controllers\Auth\LoginController::class, 'forget_password'])
    ->name('auth.forget_password');

Route::post('/forget_password', [\App\Http\Controllers\Auth\LoginController::class, 'change_password'])
    ->name('auth.change_password');