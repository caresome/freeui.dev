<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(Request $request): View
    {
        return view('pages.components.index');
    }

    public function category($category): View
    {
        $components = Component::with('categoryModel')->where('category', $category)->get();

        return view('pages.components.category', ['components' => $components, 'category' => $category]);
    }

    public function show(string $category, string $slug): View
    {
        $uiComponent = Component::where('slug', $slug)->where('category', $category)->firstOrFail();

        return view('pages.components.show', ['uiComponent' => $uiComponent]);
    }

    public function preview(string $category, string $slug): View
    {
        $uiComponent = Component::where('slug', $slug)->where('category', $category)->firstOrFail();

        return view('pages.components.preview', ['uiComponent' => $uiComponent]);
    }

    public function og(string $category, string $slug): View
    {
        $uiComponent = Component::where('slug', $slug)->where('category', $category)->firstOrFail();

        return view('pages.components.og.show', ['uiComponent' => $uiComponent]);
    }

    public function thumbnail(string $category, string $slug): View
    {
        $uiComponent = Component::where('slug', $slug)->where('category', $category)->firstOrFail();

        return view('pages.components.thumbnail.show', ['uiComponent' => $uiComponent]);
    }
}
