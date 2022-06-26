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

// Questions
Route::controller(QuestionController::class)->prefix('q')->group(function () {
    Route::get('/', 'index')
        ->name('questions.index');
    Route::get('/{question}/{slug}', 'show')
        ->name('questions.show');
});

// User must be logged in
Route::middleware(['auth'])->group(function () {
    // Questions
    Route::controller(QuestionController::class)->prefix('q')->group(function () {
        Route::get('/create', 'create')
            ->name('questions.create');
        Route::post('/store', 'store')
            ->name('questions.store');
    });
    
    // Submit an answer
    Route::post('/answers/store', [AnswerController::class, 'store'])
        ->name('answers.store');

    // Mark a answer as a solution
    Route::patch('/answer/solution', [AnswerController::class, 'markAsSolution'])
        ->name('answers.solution');

    // Submit a comment
    Route::post('/comments/store', [CommentController::class, 'store'])
        ->name('comments.store');

    // Reports
    Route::controller(ReportController::class)->prefix('reports')->group(function () {
        Route::get('/{question}', 'show')
            ->name('reports.show');
        Route::post('/store', 'store')
            ->name('reports.store');
    });

    // Bookmarks
    Route::controller(BookmarkController::class)->prefix('bookmarks')->group(function () {
        Route::get('/', 'index')
            ->name('bookmarks.index');
        Route::post('/store', 'store')
            ->name('bookmarks.store');
        Route::delete('/{bookmark}', 'destroy')
            ->name('bookmarks.destroy');
    });

    // User's dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    // User's profile edit form
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});
    
require __DIR__.'/auth.php';
