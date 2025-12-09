<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Contracts\View\View;

class CollectionController extends Controller
{
    public function index(): View
    {
        $collections = Collection::with('categories')->orderBy('title')->get();

        return view('pages.collections.index', ['collections' => $collections]);
    }

    public function show(string $collection): View
    {
        $collection = Collection::with(['categories' => function ($query): void {
            $query->withCount('components');
        }])->where('slug', $collection)->firstOrFail();

        return view('pages.collections.show', ['collection' => $collection]);
    }
}
