<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// User must be logged in
Route::middleware(['auth'])->group(function () {
    // User's dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    // User's profile edit form
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});

// Question Routes
Route::prefix('q')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])
        ->name('questions.index');
    Route::get('/create', [QuestionController::class, 'create'])
        ->middleware(['auth'])
        ->name('questions.create');
    Route::post('/store', [QuestionController::class, 'store'])
        ->middleware(['auth'])
        ->name('questions.store');

    Route::get('/{question}/{slug}', [QuestionController::class, 'show'])
        ->name('questions.show');
});

// Post request to submit an answer to a question
Route::post('/answers/store', [AnswerController::class, 'store'])
    ->middleware(['auth'])
    ->name('answers.store');

// Reports
Route::prefix('reports')->group(function () {
    Route::get('/', [ReportController::class, 'index'])
        ->name('reports.index');
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/{question}', [ReportController::class, 'show'])
            ->name('reports.show');
        Route::post('/store', [ReportController::class, 'store'])
            ->name('reports.store');
    });
});

// bookmarks
Route::prefix('bookmarks')->middleware(['auth'])->group(function () {
    Route::get('/', [BookmarkController::class, 'index'])
        ->name('bookmarks.index');
    Route::post('/store', [BookmarkController::class, 'store'])
        ->name('bookmarks.store');
    Route::delete('/{bookmark}', [BookmarkController::class, 'destroy'])
        ->name('bookmarks.destroy');
});

// Store a comment
Route::post('/comments/store', [CommentController::class, 'store'])
    ->middleware(['auth'])
    ->name('comments.store');
    
require __DIR__.'/auth.php';
