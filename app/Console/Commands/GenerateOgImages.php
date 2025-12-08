<?php

namespace App\Console\Commands;

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
        $components = Component::all();
        $force = $this->option('force');
        $this->info('Found '.$components->count().' components.');

        // Ensure directories exist
        $paths = [public_path('thumbnails'), public_path('og-images')];
        foreach ($paths as $path) {
            if (! File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
        }

        foreach ($components as $component) {
            $this->info("Checking: {$component->slug}");

            // Define paths
            $ogPathRelative = "og-images/{$component->slug}.png";
            $ogPathFull = public_path($ogPathRelative);
            $thumbPathRelative = "thumbnails/{$component->slug}.png";
            $thumbPathFull = public_path($thumbPathRelative);

            // Calculate Hash of content (Title, Description, Category, Content, Github, Layouts)
            // We include layout files effectively version the images based on their design.
            $layoutFiles = [
                resource_path('views/components/layouts/og.blade.php'),
                resource_path('views/pages/components/og/show.blade.php'),
                resource_path('views/components/layouts/thumbnail.blade.php'),
                resource_path('views/pages/components/thumbnail/show.blade.php'),
            ];

            $layoutHash = '';
            foreach ($layoutFiles as $file) {
                if (File::exists($file)) {
                    $layoutHash .= md5_file($file);
                }
            }

            $contentSource = $component->title.$component->description.$component->category.$component->content.$component->github.$layoutHash;
            $currentHash = md5($contentSource);

            // Check if generation is needed
            $ogExists = File::exists($ogPathFull);
            $thumbExists = File::exists($thumbPathFull);
            $hashMatch = ($component->content_hash === $currentHash);

            if (! $force && $ogExists && $thumbExists && $hashMatch) {
                $this->comment('  - Skipped (Hash Match)');

                continue;
            }

            // 1. Generate OG Image (1200x630)
            if ($force || ! $ogExists || ! $hashMatch) {
                $ogUrl = route('components.og', ['category' => $component->category, 'slug' => $component->slug]);
                try {
                    $this->info('  - Generating OG...');
                    Browsershot::url($ogUrl)
                        ->setOption('args', ['--no-sandbox', '--disable-setuid-sandbox'])
                        ->ignoreHttpsErrors()
                        ->windowSize(1200, 630)
                        ->waitUntilNetworkIdle()
                        ->save($ogPathFull);
                } catch (\Exception $e) {
                    $this->error('  - OG Failed: '.$e->getMessage());
                    $ogPathRelative = null;
                }
            }

            // 2. Generate Thumbnail (800x500)
            if ($force || ! $thumbExists || ! $hashMatch) {
                $thumbUrl = route('components.thumbnail', ['category' => $component->category, 'slug' => $component->slug]);
                try {
                    $this->info('  - Generating Thumbnail...');
                    Browsershot::url($thumbUrl)
                        ->setOption('args', ['--no-sandbox', '--disable-setuid-sandbox'])
                        ->ignoreHttpsErrors()
                        ->windowSize(800, 500)
                        ->waitUntilNetworkIdle()
                        ->save($thumbPathFull);
                } catch (\Exception $e) {
                    $this->error('  - Thumbnail Failed: '.$e->getMessage());
                    $thumbPathRelative = null;
                }
            }

            // Update Component Model (Images + Hash)
            if ($ogPathRelative || $thumbPathRelative) {
                $component->update([
                    'og_image' => $ogPathRelative,
                    'thumbnail_path' => $thumbPathRelative,
                    'content_hash' => $currentHash,
                ]);
                $this->info('  - Records & Hash updated');
            }
        }
    }
}
