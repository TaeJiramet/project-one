<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramController;

// Public routes
Route::get('/', [PublicController::class, 'index']);
Route::get('/test', [PublicController::class, 'index']);

// Authentication (simple session based)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Program management (single program) - requires authentication
Route::middleware('auth')->group(function () {
	// show edit form for the single program
	Route::get('program', [ProgramController::class, 'edit'])->name('program.edit');
	// update the single program
	Route::post('program', [ProgramController::class, 'update'])->name('program.update');
});
