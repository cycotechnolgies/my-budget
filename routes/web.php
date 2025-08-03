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
    
    Route::view('/expences', 'expences')->name('expences');

    Route::get('/income', [incomeController::class, 'index'])->name('income');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
