<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component;
use Illuminate\Contracts\View\View;

class ComponentController extends Controller
{
    public function category(string $collection, string $category): View
    {
        $collectionModel = Collection::where('slug', $collection)->firstOrFail();
        $categoryModel = Category::with('collectionModel')
            ->where('slug', $category)
            ->where('collection', $collection)
            ->firstOrFail();
        $components = Component::with('categoryModel')
            ->where('category', $category)
            ->get();

        return view('pages.components.category', [
            'components' => $components,
            'category' => $categoryModel,
            'collection' => $collectionModel,
        ]);
    }

    public function show(string $collection, string $category, string $slug): View
    {
        $uiComponent = Component::with('categoryModel.collectionModel')
            ->where('slug', $slug)
            ->where('category', $category)
            ->firstOrFail();

        return view('pages.components.show', [
            'uiComponent' => $uiComponent,
            'collection' => $collection,
        ]);
    }

    public function preview(string $collection, string $category, string $slug): View
    {
        $uiComponent = Component::with('categoryModel.collectionModel')
            ->where('slug', $slug)
            ->where('category', $category)
            ->firstOrFail();

        return view('pages.components.preview', [
            'uiComponent' => $uiComponent,
            'collection' => $collection,
        ]);
    }

    public function og(string $collection, string $category, string $slug): View
    {
        $uiComponent = Component::where('slug', $slug)->where('category', $category)->firstOrFail();

        return view('pages.components.og.show', ['uiComponent' => $uiComponent]);
    }
}
