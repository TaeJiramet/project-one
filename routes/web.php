<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Public routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/test', [PublicController::class, 'index']);

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Program view (read-only) - for public view
Route::get('program', [ProgramController::class, 'edit'])->name('program.show');

// Admin routes
Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('auth')->name('admin.dashboard');

// Other admin routes
Route::middleware('auth')->group(function () {
    // Program management
    Route::get('admin/programs', [\App\Http\Controllers\AdminProgramController::class, 'index'])->name('admin.programs.index');
    Route::get('admin/programs/edit', [\App\Http\Controllers\AdminProgramController::class, 'edit'])->name('admin.programs.edit');
    Route::put('admin/programs', [\App\Http\Controllers\AdminProgramController::class, 'update'])->name('admin.programs.update');
    
    // Activities management
    Route::resource('admin/activities', \App\Http\Controllers\ActivityController::class)->names([
        'index' => 'admin.activities.index',
        'create' => 'admin.activities.create',
        'store' => 'admin.activities.store',
        'show' => 'admin.activities.show',
        'edit' => 'admin.activities.edit',
        'update' => 'admin.activities.update',
        'destroy' => 'admin.activities.destroy',
    ]);
    
    // Faculty members management
    Route::resource('admin/faculty', \App\Http\Controllers\FacultyMemberController::class)->names([
        'index' => 'admin.faculty.index',
        'create' => 'admin.faculty.create',
        'store' => 'admin.faculty.store',
        'show' => 'admin.faculty.show',
        'edit' => 'admin.faculty.edit',
        'update' => 'admin.faculty.update',
        'destroy' => 'admin.faculty.destroy',
    ]);
    
    // Career opportunities management
    Route::resource('admin/careers', \App\Http\Controllers\CareerOpportunityController::class)->names([
        'index' => 'admin.careers.index',
        'create' => 'admin.careers.create',
        'store' => 'admin.careers.store',
        'show' => 'admin.careers.show',
        'edit' => 'admin.careers.edit',
        'update' => 'admin.careers.update',
        'destroy' => 'admin.careers.destroy',
    ]);
    
    // Laboratories management
    Route::resource('admin/laboratories', \App\Http\Controllers\LaboratoryController::class)->names([
        'index' => 'admin.laboratories.index',
        'create' => 'admin.laboratories.create',
        'store' => 'admin.laboratories.store',
        'show' => 'admin.laboratories.show',
        'edit' => 'admin.laboratories.edit',
        'update' => 'admin.laboratories.update',
        'destroy' => 'admin.laboratories.destroy',
    ]);
    
    // Student works management
    Route::resource('admin/student-works', \App\Http\Controllers\StudentWorkController::class)->names([
        'index' => 'admin.student-works.index',
        'create' => 'admin.student-works.create',
        'store' => 'admin.student-works.store',
        'show' => 'admin.student-works.show',
        'edit' => 'admin.student-works.edit',
        'update' => 'admin.student-works.update',
        'destroy' => 'admin.student-works.destroy',
    ]);
    
    // Videos management
    Route::resource('admin/videos', \App\Http\Controllers\VideoController::class)->names([
        'index' => 'admin.videos.index',
        'create' => 'admin.videos.create',
        'store' => 'admin.videos.store',
        'show' => 'admin.videos.show',
        'edit' => 'admin.videos.edit',
        'update' => 'admin.videos.update',
        'destroy' => 'admin.videos.destroy',
    ]);
});
