<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OpinionDecouverteController;

Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualite');
Route::get('/rubriques', [RubriqueController::class, 'index'])->name('rubrique');
Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/opinions-decouverte', [OpinionDecouverteController::class, 'index'])->name('opinionDecouverte');
Route::get('/article/news/{id}', [ArticleController::class, 'show'])->name('actualites.show');
Route::post('/actualites/{id}/commentaires', [ArticleController::class, 'store'])->name('commentaires.store');


Route::get('/about', function () {
  return view('about');
});

