<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $categories = Category::orderBy('title')->get();

        return view('pages.home', [
            'categories' => $categories,
        ]);
    }
}
