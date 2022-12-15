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

Route::group(["prefix" => 'blog', "namespace" => "\App\Http\Controllers"], function (){
    
    Route::get("/", ['uses' => 'BlogController@index'])->name('blog.index');
    Route::get("/{post}", ['uses' => 'BlogController@show'])
        ->whereNumber('post')
        ->name('blog.show');
    
    Route::get("/create", ["uses" => "BlogController@create"])
        ->name('blog.create');
    
    Route::get('/edit/{id}', ['uses' => "BlogController@edit"])
        ->whereNumber('id')
        ->name('blog.edit');
    
    // Post 
    Route::post("/", ["uses" => "BlogController@store"])
        ->name('blog.store');
    
    // Put and Patch 
    Route::put("/{id}/{slug}", ['uses' => "BlogController@update"])
        ->whereNumber('id')
        ->whereAlpha('slug')
        ->name('blog.update');
    
    Route::patch("/{id}", ['uses' => 'BlogController@update'])
        ->whereNumber('id')
        ->name('blog.update');
    
    Route::delete("/{id}", ['uses' => 'BlogController@destroy'])
        ->whereNumber('id')
        ->name('blog.delete');
});


Route::group(["prefix" => 'post', "namespace" => "\App\Http\Controllers"], function () {
    Route::get("/", [\App\Http\Controllers\PostsController::class, 'index'])
        ->name('post.index');

    Route::get('/{name}', [\App\Http\Controllers\PostsController::class, 'show'])
        ->whereAlpha('name')
        ->name("post.show");
});

Route::get("/", \App\Http\Controllers\HomeController::class);

// fallback route
Route::fallback(FallBackController::class);

