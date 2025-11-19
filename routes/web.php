<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Show the login form
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Handle the login submission
Route::post('/login', [AuthController::class, 'login']);

// Protected routes for authenticated users
Route::middleware('auth')->group(function () {
    // Dashboard page
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Handle logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
