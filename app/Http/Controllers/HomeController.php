<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $collections = Collection::withComponents()
            ->with(['categories' => fn ($query) => $query->whereHas('components')->withCount('components')->orderBy('title')])
            ->orderBy('title')
            ->get();

        return view('pages.home', [
            'collections' => $collections,
        ]);
    }
}
