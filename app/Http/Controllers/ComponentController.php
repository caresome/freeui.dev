<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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
     * Return component data as JSON for AI tools (v0, Lovable, etc.)
     */
    public function registry(string $collection, string $category, string $slug): JsonResponse
    {
        $uiComponent = $this->findComponent($category, $slug);

        $registryData = [
            '$schema' => config('freeui.registry_schema'),
            'name' => $uiComponent->slug,
            'type' => 'registry:block',
            'description' => $uiComponent->title.' - A Tailwind CSS component from FreeUI',
            'files' => [
                [
                    'path' => "components/{$uiComponent->slug}.html",
                    'content' => $uiComponent->content,
                    'type' => 'registry:component',
                ],
            ],
            'meta' => [
                'source' => 'FreeUI',
                'sourceUrl' => url("/{$uiComponent->categoryModel->collection}/{$uiComponent->category}/{$uiComponent->slug}"),
                'category' => $uiComponent->categoryModel->title ?? $uiComponent->category,
                'collection' => $uiComponent->categoryModel->collectionModel->title ?? $uiComponent->categoryModel->collection,
            ],
        ];

        return response()->json($registryData);
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
