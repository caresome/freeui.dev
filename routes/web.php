<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::get('/collections/{collection}', [CollectionController::class, 'show'])
    ->name('collections.show')
    ->where('collection', '[a-z0-9\-]+');

Route::get('/{collection}/{category}', [ComponentController::class, 'category'])
    ->name('components.category')
    ->where(['collection' => '[a-z0-9\-]+', 'category' => '[a-z0-9\-]+']);

Route::get('/{collection}/{category}/{slug}', [ComponentController::class, 'show'])
    ->name('components.show')
    ->where(['collection' => '[a-z0-9\-]+', 'category' => '[a-z0-9\-]+', 'slug' => '[a-z0-9\-]+']);

Route::get('/{collection}/{category}/{slug}/preview', [ComponentController::class, 'preview'])
    ->name('components.preview')
    ->where(['collection' => '[a-z0-9\-]+', 'category' => '[a-z0-9\-]+', 'slug' => '[a-z0-9\-]+']);

Route::get('/{collection}/{category}/{slug}/registry.json', [ComponentController::class, 'registry'])
    ->name('components.registry')
    ->where(['collection' => '[a-z0-9\-]+', 'category' => '[a-z0-9\-]+', 'slug' => '[a-z0-9\-]+']);

Route::get('/{collection}/{category}/{slug}/code.txt', [ComponentController::class, 'code'])
    ->name('components.code')
    ->where(['collection' => '[a-z0-9\-]+', 'category' => '[a-z0-9\-]+', 'slug' => '[a-z0-9\-]+']);
