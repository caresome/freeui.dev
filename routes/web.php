<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/components', [ComponentController::class, 'index'])->name('components.index');
Route::get('/components/{category}', [ComponentController::class, 'category'])->name('components.category');
Route::get('/components/{category}/{slug}', [ComponentController::class, 'show'])->name('components.show');
Route::get('/components/{category}/{slug}/preview', [ComponentController::class, 'preview'])->name('components.preview');
Route::get('/components/{category}/{slug}/og', [ComponentController::class, 'og'])->name('components.og');
Route::get('/components/{category}/{slug}/thumbnail', [ComponentController::class, 'thumbnail'])->name('components.thumbnail');
