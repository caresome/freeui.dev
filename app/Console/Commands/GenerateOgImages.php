<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Component;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;

class GenerateOgImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'og:generate {--force : Force regenerate all images}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate OG images for all components';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $components = Component::with('categoryModel')->get();
        $force = $this->option('force');
        $this->info('Found '.$components->count().' components.');

        // Ensure OG images directory exists
        $ogImagesPath = public_path('og-images');
        if (! File::exists($ogImagesPath)) {
            File::makeDirectory($ogImagesPath, 0755, true);
        }

        foreach ($components as $component) {
            $this->info("Checking: {$component->slug}");

            // Define paths (using WebP for smaller file sizes)
            $ogPathRelative = "og-images/{$component->slug}.webp";
            $ogPathFull = public_path($ogPathRelative);

            // Calculate Hash of content (Title, Category, Content, Github, Layouts)
            // We include layout files to effectively version the images based on their design.
            $layoutFiles = [
                resource_path('views/components/layouts/og.blade.php'),
                resource_path('views/pages/components/og/show.blade.php'),
            ];

            $layoutHash = '';
            foreach ($layoutFiles as $file) {
                if (File::exists($file)) {
                    $layoutHash .= md5_file($file);
                }
            }

            $contentSource = $component->title.$component->category.$component->content.$component->github.$layoutHash;
            $currentHash = md5($contentSource);

            // Check if generation is needed
            $ogExists = File::exists($ogPathFull);
            $hashMatch = ($component->content_hash === $currentHash);

            if (! $force && $ogExists && $hashMatch) {
                $this->comment('  - Skipped (Hash Match)');

                continue;
            }

            // Generate OG Image (1200x630)
            if ($force || ! $ogExists || ! $hashMatch) {
                $collection = $component->categoryModel->collection ?? 'marketing';
                $ogUrl = route('components.og', ['collection' => $collection, 'category' => $component->category, 'slug' => $component->slug]);
                try {
                    $this->info('  - Generating OG...');
                    Browsershot::url($ogUrl)
                        ->setOption('args', ['--no-sandbox', '--disable-setuid-sandbox'])
                        ->ignoreHttpsErrors()
                        ->windowSize(1200, 630)
                        ->setScreenshotType('webp', 85)
                        ->waitUntilNetworkIdle()
                        ->save($ogPathFull);
                } catch (\Exception $e) {
                    $this->error('  - OG Failed: '.$e->getMessage());
                    $ogPathRelative = null;
                }
            }

            // Update Component Model (OG Image + Hash)
            if ($ogPathRelative) {
                $component->update([
                    'og_image' => $ogPathRelative,
                    'content_hash' => $currentHash,
                ]);
                $this->info('  - Records & Hash updated');
            }
        }
    }
}
