<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Route::get('/blog', [BlogController::class, 'blogModel']);

Route::group(['prefix' => 'blogs'], function () {
    Route::get('/', [BlogController::class, 'home'])->name('newPost');
    Route::post('/new_post', [BlogController::class, 'createBlog'])->name('submit.post');
    Route::get('/stats', [BlogController::class, 'getStatus'])->name('statuses');
    Route::get('/stats/{id}', [BlogController::class, 'getPostByStatus'])->name('byStatus');
    Route::get('/category', [BlogController::class, 'getCategory'])->name('categories');
    Route::get('/category/{id}', [BlogController::class, 'getPostByCategory'])->name('byCategory');
    Route::get('/posts', [BlogController::class, 'getAllPosts'])->name('posts');
    Route::delete('/{id}', [BlogController::class, 'softDeleteBlog'])->name('blog.delete');
    Route::post('/new_comment/{id}', [BlogController::class, 'addComment'])->name('submit.comment');
    Route::get('/hasOne', [BlogController::class, 'oneToOneRel']);
    Route::get('/hasMany', [BlogController::class, 'oneToManyRel']);
    Route::get('/belongsToMany', [BlogController::class, 'manyToManyRel']);
    Route::get('/insertTags', [BlogController::class, 'insertTags']);
    Route::get('/deleteTags', [BlogController::class, 'deleteTags']);
});