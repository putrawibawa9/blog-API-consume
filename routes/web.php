<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FetchBlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addBlog', [FetchBlogController::class, 'addBlog']);
Route::post('/blogs/Add', [FetchBlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs', [FetchBlogController::class, 'fetchData']);
Route::get('/blogs/{id}/edit', [FetchBlogController::class, 'editBlog'])->name('blogs.edit');
Route::post('/blogs/{id}', [FetchBlogController::class, 'updateBlog'])->name('blogs.update');
Route::delete('/blogs/{id}', [FetchBlogController::class, 'deleteBlog']);

