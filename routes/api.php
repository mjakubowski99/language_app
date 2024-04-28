<?php

use Auth\Presentation\Controllers\AuthController;
use Course\Presentation\Http\Controller\CourseController;
use Course\Presentation\Http\Controller\SubjectController;
use Exercise\Presentation\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

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

// Course
Route::get('/courses/', [CourseController::class, 'index'])->name('course.index');
Route::get('/courses/{id}', [CourseController::class, 'get'])->name('course.get');

Route::get('/courses/subjects/{id}', [SubjectController::class, 'get'])->name('course.subject.get');

Route::post('/courses/subjects/{id}/quiz', [SubjectController::class, 'generateQuiz'])->name('course.subject.quiz.create');

// Exercises
Route::get('/exercises/quiz/{id}', [QuizController::class, 'get'])
    ->name('exercises.quiz')
    ->middleware('auth:sanctum');
