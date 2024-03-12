<?php

use Illuminate\Support\Facades\Route;
use Auth\Presentation\Http\Controller\AuthController;
use Exercise\Presentation\Http\Controller\QuizController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('auth')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login/refresh', [AuthController::class, 'refreshLogin'])->name('auth.login.refresh');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('exercises')->group(function(){
    Route::get('/quiz/{id}', [QuizController::class, 'get'])->name('exercises.quiz');
});
