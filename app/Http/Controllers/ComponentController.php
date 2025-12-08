<?php

namespace App\Http\Controllers;

use App\Models\Component;

class ComponentController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $components = Component::all();

        return view('pages.components.index', ['components' => $components]);
    }

    public function category($category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $components = Component::where('category', $category)->get();

        return view('pages.components.category', ['components' => $components, 'category' => $category]);
    }

    public function show(string $category, string $slug): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $uiComponent = Component::where('slug', $slug)->where('category', $category)->firstOrFail();

        return view('pages.components.show', ['uiComponent' => $uiComponent]);
    }

    public function preview(string $category, string $slug): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $uiComponent = Component::where('slug', $slug)->where('category', $category)->firstOrFail();

        return view('pages.components.preview', ['uiComponent' => $uiComponent]);
    }
}
