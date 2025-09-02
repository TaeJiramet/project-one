<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index']);
Route::get('/test', [PublicController::class, 'index']);
