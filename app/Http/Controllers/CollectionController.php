<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Contracts\View\View;

class CollectionController extends Controller
{
    public function show(string $collection): View
    {
        $collection = Collection::withCategoriesAndCounts()
            ->where('slug', $collection)
            ->firstOrFail();

        return view('pages.collections.show', ['collection' => $collection]);
    }
}
