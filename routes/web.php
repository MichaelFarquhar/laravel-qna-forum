<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', [HomeController::class, 'index']);

// User must be logged in
Route::middleware(['auth'])->group(function () {
    
    // User's dashboard after logging in
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

// Question Routes
Route::prefix('q')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/create', [QuestionController::class, 'create'])
        ->middleware(['auth'])->name('questions.create');
    Route::post('/store', [QuestionController::class, 'store'])
        ->middleware(['auth'])->name('questions.store');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth']);

require __DIR__.'/auth.php';
