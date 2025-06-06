<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'getPost'])->name('home');

Route::post('/new_post', [BlogController::class, 'createBlog'])->name('pages.submit');

Route::get('/content/{id}', [BlogController::class, 'getContent']);

Route::get('/recent', [BlogController::class, 'getRecentPost'])->name('recent');

Route::get('/category/{name}', [BlogController::class, 'getPostsByCategory'])->name('post');

