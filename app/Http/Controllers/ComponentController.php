<?php

namespace App\Http\Controllers;

use App\Models\Component;

class ComponentController extends Controller
{
    public function index(\Illuminate\Http\Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $search = $request->input('search');
        $components = Component::query();

        if ($search) {
            $components = $components->get()->filter(function ($component) use ($search): bool {
                // Determine category title from relationship or fallback
                $categoryTitle = $component->categoryModel ? $component->categoryModel->title : $component->category;

                return stripos((string) $component->title, (string) $search) !== false
                    || stripos((string) $component->description, (string) $search) !== false
                    || stripos($categoryTitle, (string) $search) !== false;
            });
        } else {
            $components = $components->get();
        }

        return view('pages.components.index', ['components' => $components, 'search' => $search]);
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
