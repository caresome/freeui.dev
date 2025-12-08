<?php

use App\Http\Controllers\ComponentController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View {
    $categories = Category::orderBy('title')->get();

    return view('pages.home', [
        'categories' => $categories,
    ]);
});

Route::get('/components', [ComponentController::class, 'index'])->name('components.index');
Route::get('/components/{category}', [ComponentController::class, 'category'])->name('components.category');
Route::get('/components/{category}/{slug}', [ComponentController::class, 'show'])->name('components.show');
Route::get('/components/{category}/{slug}/preview', [ComponentController::class, 'preview'])->name('components.preview');
