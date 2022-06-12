<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\BookmarkController;
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
    
    // User's dashboard after logging in
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth']);

require __DIR__.'/auth.php';
