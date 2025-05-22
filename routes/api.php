<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Route Api
Route::post('/login', [Controllers\AuthController::class, 'login']);
Route::post('/register', [Controllers\AuthController::class, 'register']);
Route::post('/cloture', [Controllers\RapportController::class, 'cloture']);
Route::post('/validation', [Controllers\AuthController::class, 'validation']);
Route::post('/syncuser', [Controllers\UserController::class, 'sync']);

Route::get('/rapport', [Controllers\RapportController::class, 'register']);
Route::get('/users', [Controllers\UserController::class, 'index']);
