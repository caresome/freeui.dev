<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $collections = Collection::with(['categories' => function ($query): void {
            $query->orderBy('title');
        }])->orderBy('title')->get();

        return view('pages.home', [
            'collections' => $collections,
        ]);
    }
}
