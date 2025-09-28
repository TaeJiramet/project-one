<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProgramController;

// Public routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/test', [PublicController::class, 'index']);

// Program view (read-only) - for public view
Route::get('program', [ProgramController::class, 'edit'])->name('program.show');
