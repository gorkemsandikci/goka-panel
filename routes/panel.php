<?php

use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ArticleController;
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

});
