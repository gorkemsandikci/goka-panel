<?php

use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ArticleController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\WorldNewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['panelsetting', 'auth'], 'prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'article'], function () {
        Route::get('', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
        Route::put('/{id}/update', [ArticleController::class, 'update'])->name('article.update');
        Route::delete('/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');
        Route::post('/status-update', [ArticleController::class, 'statusUpdate'])->name('article.status');
    });

    Route::group(['prefix' => 'world-news'], function () {
        Route::get('', [WorldNewsController::class, 'index'])->name('world-news.index');
        Route::get('/create', [WorldNewsController::class, 'create'])->name('world-news.create');
        Route::get('/{id}/edit', [WorldNewsController::class, 'edit'])->name('world-news.edit');
        Route::post('/store', [WorldNewsController::class, 'store'])->name('world-news.store');
        Route::put('/{id}/update', [WorldNewsController::class, 'update'])->name('world-news.update');
        Route::delete('/destroy', [WorldNewsController::class, 'destroy'])->name('world-news.destroy');
        Route::post('/status-update', [WorldNewsController::class, 'statusUpdate'])->name('world-news.status');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::put('/{id}/update', [PostController::class, 'update'])->name('post.update');
        Route::delete('/destroy', [PostController::class, 'destroy'])->name('post.destroy');
        Route::post('/status-update', [PostController::class, 'statusUpdate'])->name('post.status');
    });

});
