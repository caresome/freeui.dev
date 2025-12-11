<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class ComponentController extends Controller
{
    public function category(string $collection, string $category): View
    {
        $categoryModel = Category::with('collectionModel')
            ->where('slug', $category)
            ->where('collection', $collection)
            ->firstOrFail();

        $components = Component::with('categoryModel')
            ->where('category', $category)
            ->orderBy('publish_at', 'desc')
            ->get();

        return view('pages.components.category', [
            'components' => $components,
            'category' => $categoryModel,
            'collection' => $categoryModel->collectionModel,
        ]);
    }

    public function show(string $collection, string $category, string $slug): View
    {
        $uiComponent = $this->findComponent($category, $slug);

        return view('pages.components.show', [
            'uiComponent' => $uiComponent,
            'collection' => $collection,
        ]);
    }

    public function preview(string $collection, string $category, string $slug): View
    {
        $uiComponent = $this->findComponent($category, $slug);

        return view('pages.components.preview', [
            'uiComponent' => $uiComponent,
            'collection' => $collection,
        ]);
    }

    /**
     * Return component code as raw text for AI tools.
     */
    public function code(string $collection, string $category, string $slug): Response
    {
        $uiComponent = $this->findComponent($category, $slug);

        return response($uiComponent->content)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Find a component by category and slug with eager-loaded relationships.
     */
    private function findComponent(string $category, string $slug): Component
    {
        return Component::withRelations()
            ->bySlug($category, $slug)
            ->firstOrFail();
    }
}
