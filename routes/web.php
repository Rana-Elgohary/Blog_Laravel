<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    $name = "Rana From Route";
    return view('test', ['nameFromRouteFile' => $name]);
    // but anything like this or logic must be in the controller not here
});

// If Logic in the controller:
Route::get('testFromController', [TestController::class, 'firstAction']);

Route::get('post', [BlogController::class, 'index']) -> name('posts.index');

Route::get('post/create', [BlogController::class, 'create']) -> name('posts.create');
Route::post('post', [BlogController::class, 'store']) -> name("posts.store");

// Route::get('post/{post}', [BlogController::class, 'show']);
// If I want to make a shortcut name to write it in ancher tag in blade files when routing, if i don't want to write the whole url there
// This will be helpful if i change the URL at any time, i don't have to rewrite it in all the blade files 
Route::get('post/{post}', [BlogController::class, 'show']) -> name('posts.show');

Route::get('post/{post}/edit', [BlogController::class, 'edit']) -> name('posts.edit');
Route::put('post/{post}', [BlogController::class, 'update']) -> name('posts.update');

Route::delete('post/{post}', [BlogController::class, 'destroy']) -> name('posts.destroy');

