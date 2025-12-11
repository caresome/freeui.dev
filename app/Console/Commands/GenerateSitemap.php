<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component;
use App\Services\SearchDataProvider;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.xml file';

    public function handle(): int
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // Add home page
        $sitemap->add(Url::create('/')->setPriority(1.0));

        // Load all collections with categories that have components in a single query
        $collections = Collection::with(['categories' => fn ($q) => $q->whereHas('components')])
            ->whereHas('categories.components')
            ->get();

        foreach ($collections as $collection) {
            $sitemap->add(
                Url::create(route('collections.show', $collection->slug))
                    ->setPriority(0.8)
            );
        }

        // Load all categories with their collection relationship
        $categories = Category::with('collectionModel')
            ->whereHas('components')
            ->get();

        foreach ($categories as $category) {
            $sitemap->add(
                Url::create(route('components.category', [
                    'collection' => $category->collection,
                    'category' => $category->slug,
                ]))->setPriority(0.7)
            );
        }

        // Load all components with category and collection relationships
        $components = Component::with('categoryModel.collectionModel')->get();

        foreach ($components as $component) {
            $sitemap->add(
                Url::create(route('components.category', [
                    'collection' => $component->categoryModel?->collection,
                    'category' => $component->category,
                ]).'#'.$component->slug)->setPriority(0.6)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        // Clear search data cache since content may have changed
        app(SearchDataProvider::class)->clearCache();

        $this->info('Sitemap generated successfully!');

        return Command::SUCCESS;
    }
}
