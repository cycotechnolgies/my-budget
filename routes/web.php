<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\incomeController;

// Auth routes
require __DIR__ . '/auth.php';

// Public route
Route::view('/', 'auth.login');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('/worklog', 'worklog')->name('worklog');
    
    Route::get('/expences', [incomeController::class, 'index'])->name('expences.index');
    Route::get('/expences/{id}', [incomeController::class, 'show'])->name('expences.show');
    Route::put('/expences/{id}', [IncomeController::class, 'update'])->name('expences.update');
    Route::post('/expences', [IncomeController::class, 'store'])->name('expences.store');
    Route::delete('/expences/{id}', [IncomeController::class, 'destroy'])->name('expences.del');

    Route::get('/income', [incomeController::class, 'index'])->name('income.index');
    Route::get('/income/{id}', [incomeController::class, 'show'])->name('income.show');
    Route::put('/income/{id}', [IncomeController::class, 'update'])->name('income.update');
    Route::post('/income', [IncomeController::class, 'store'])->name('income.store');
    Route::delete('/income/{id}', [IncomeController::class, 'destroy'])->name('income.del');

});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
