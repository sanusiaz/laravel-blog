<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\FallBackController;

/**
 * Get = Get a resource
 * Post - Create a new Resource 
 * Put - Update a Resource 
 * Patch - Modify a resource
 * Delete  -  Remove / Delete a resource 
 * Options - Ask the server the verbs that will be allowed
 */
Route::get("/posts", [\App\Http\Controllers\PostsController::class, 'index']);

Route::get("/", \App\Http\Controllers\HomeController::class);

Route::get("/blog", [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get("/blog/{post}", [\App\Http\Controllers\BlogController::class, 'show'])
    ->whereNumber('post')
    ->name('blog.show');

Route::get("/blog/create", [\App\Http\Controllers\BlogController::class, 'create'])
    ->name('blog.create');

// Post 
Route::post("/blog", [\App\Http\Controllers\BlogController::class, 'store'])
    ->name('blog.store');

// Put and Patch 
Route::put("/blog/{id}/{slug}", [\App\Http\Controllers\BlogController::class, 'update'])
    ->whereNumber('id')
    ->whereAlpha('slug')
    ->name('blog.update');

Route::patch("/blog/{id}", [\App\Http\Controllers\BlogController::class, 'update'])
    ->whereNumber('id')
    ->name('blog.update');

Route::delete("/blog/{id}", [\App\Http\Controllers\BlogController::class, 'destroy'])
    ->whereNumber('id')
    ->name('blog.destroy');


Route::get('/post/{name}', [\App\Http\Controllers\PostsController::class, 'show'])
    ->whereAlpha('name');

// fallback route
// Route::fallback([\App\Http\Controllers\FallBackController::class, '__not_found']);
Route::fallback(FallBackController::class);

