<?php
/**
 * @package laravelapp
 * 
 * @author sanusiaz
 */


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;

Route::get('dashboard', [DashboardController::class, 'index']);


Route::get('/admin/users', [UsersController::class, 'index'])
    ->name('admin.users');

Route::get('/admin/users/create', [UsersController::class, 'create'])
    ->name('user.create');

Route::post('/admin/users', [UsersController::class, 'store'])
    ->name('admin.store');

Route::delete('/users/{id}', [UsersController::class, 'destroy'])
    ->name('users.delete');