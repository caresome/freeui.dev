<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component;
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

        $sitemap->add(Url::create('/')->setPriority(1.0));

        $sitemap->add(Url::create('/collections')->setPriority(0.9));

        Collection::whereHas('categories.components')->get()->each(function ($collection) use ($sitemap): void {
            $sitemap->add(
                Url::create(route('collections.show', $collection->slug))
                    ->setPriority(0.8)
            );
        });

        Category::with('collectionModel')
            ->whereHas('components')
            ->get()
            ->each(function ($category) use ($sitemap): void {
                $sitemap->add(
                    Url::create(route('components.category', [
                        'collection' => $category->collection,
                        'category' => $category->slug,
                    ]))->setPriority(0.7)
                );
            });

        Component::with('categoryModel')->get()->each(function ($component) use ($sitemap): void {
            $sitemap->add(
                Url::create(route('components.show', [
                    'collection' => $component->categoryModel->collection,
                    'category' => $component->category,
                    'slug' => $component->slug,
                ]))->setPriority(0.6)
            );
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');

        return Command::SUCCESS;
    }
}
