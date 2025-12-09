<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::get('/collections/{collection}', [CollectionController::class, 'show'])->name('collections.show');

Route::get('/{collection}/{category}', [ComponentController::class, 'category'])->name('components.category');
Route::get('/{collection}/{category}/{slug}', [ComponentController::class, 'show'])->name('components.show');
Route::get('/{collection}/{category}/{slug}/preview', [ComponentController::class, 'preview'])->name('components.preview');
Route::get('/{collection}/{category}/{slug}/og', [ComponentController::class, 'og'])->name('components.og');
Route::get('/{collection}/{category}/{slug}/thumbnail', [ComponentController::class, 'thumbnail'])->name('components.thumbnail');
