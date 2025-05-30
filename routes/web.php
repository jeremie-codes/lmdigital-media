<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\ServiceController;

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/news', [ArticleController::class, 'news'])->name('articles.index');
Route::get('/news/{cat}', [ArticleController::class, 'news'])->name('articles.index');
Route::get('/rubriques', [RubriqueController::class, 'index'])->name('rubrique');
Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/politiques', [RubriqueController::class, 'index'])->name('politic');
Route::get('/politiques/{id}', [RubriqueController::class, 'index'])->name('politic.show');
Route::get('/sports', [RubriqueController::class, 'sport'])->name('sports');
Route::get('/economies', [RubriqueController::class, 'economie'])->name('eonomie');
Route::get('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');
Route::get('/article/news/{id}', [ArticleController::class, 'show'])->name('actualites.show');
Route::post('/actualites/{id}/commentaires', [ArticleController::class, 'store'])->name('commentaires.store');
Route::post('/like/{id}', [LikeController::class, 'toggle']);
Route::get('/about', function () {
  return view('about');
});

