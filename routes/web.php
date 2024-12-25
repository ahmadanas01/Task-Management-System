<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Public route for the homepage
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('tasks.index');
    }
    return view('auth.login');
});

// Redirect /dashboard to tasks.index
Route::get('/dashboard', function () {
    return redirect()->route('tasks.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group routes for authenticated users
Route::middleware('auth')->group(function () {
    // Profile Management Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Task Management Routes
    Route::resource('tasks', TaskController::class)->except(['show']); // Web-only task routes
});

// Include authentication routes
require __DIR__ . '/auth.php';
