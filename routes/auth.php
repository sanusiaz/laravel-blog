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
    ->name('auth.sore');