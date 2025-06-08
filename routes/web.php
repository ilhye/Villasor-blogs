<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'getPost'])->name('home');

Route::post('/new_post', [BlogController::class, 'createBlog'])->name('pages.submit');

Route::get('/content/{id}', [BlogController::class, 'getContent']);

Route::get('/recent', [BlogController::class, 'getRecentPost'])->name('recent');

Route::get('/category/{name}', [BlogController::class, 'getPostsByCategory'])->name('post');

Route::get('/blog', [BlogController::class, 'blogModel']);

Route::get('/blog/stats', [BlogController::class, 'blogStatus']);

Route::get('/blog/category', [BlogController::class, 'getCategory']);

Route::get('/blog/posts', [BlogController::class, 'getAllPosts']);

Route::delete('/blog/{id}', [BlogController::class, 'softDeleteBlog'])->name('blog.delete');;