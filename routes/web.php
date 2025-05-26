<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OpinionDecouverteController;

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/news', [ActualiteController::class, 'index'])->name('articles.index');
Route::get('/rubriques', [RubriqueController::class, 'index'])->name('rubrique');
Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/politiques', [OpinionDecouverteController::class, 'index'])->name('politic');
Route::get('/sports', [OpinionDecouverteController::class, 'sport'])->name('sports');
Route::get('/economies', [OpinionDecouverteController::class, 'economie'])->name('eonomie');
Route::get('/newsletter/subscribe', [OpinionDecouverteController::class, 'index'])->name('newsletter.subscribe');
Route::get('/article/news/{id}', [ArticleController::class, 'show'])->name('actualites.show');
Route::post('/actualites/{id}/commentaires', [ActualiteController::class, 'store'])->name('commentaires.store');


Route::get('/about', function () {
  return view('about');
});

