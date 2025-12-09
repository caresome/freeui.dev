<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

/**
 * @property string $slug
 * @property string $title
 * @property string $category
 * @property string|null $content
 * @property string|null $github
 * @property string|null $og_image
 * @property string|null $content_hash
 * @property-read string $github_url
 * @property-read string $avatar_url
 * @property-read string $og_image_url
 * @property-read Category|null $categoryModel
 */
class Component extends Model
{
    use HasFactory;
    use Orbital;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'slug';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'content',
        'github',
        'og_image',
        'content_hash',
    ];

    public static function getOrbitalPath(): string
    {
        return base_path('content/components');
    }

    public static function schema(Blueprint $table): void
    {
        // Define the schema for the component
        $table->string('slug')->primary();
        $table->string('title');
        $table->string('category')->default('Uncategorized');
        $table->text('content')->nullable();
        $table->string('github')->nullable();
        $table->string('og_image')->nullable();
        $table->string('content_hash')->nullable();
    }

    /**
     * Get the GitHub profile URL.
     */
    public function getGithubUrlAttribute(): string
    {
        return "https://github.com/{$this->github}";
    }

    /**
     * Get the GitHub avatar URL.
     */
    public function getAvatarUrlAttribute(): string
    {
        return "https://github.com/{$this->github}.png";
    }

    /**
     * Get the category that the component belongs to.
     */
    public function categoryModel(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'slug');
    }

    /**
     * Get the OG image URL.
     */
    public function getOgImageUrlAttribute(): string
    {
        if ($this->og_image) {
            return asset($this->og_image);
        }

        // Fallback
        return asset('og-images/'.$this->slug.'.webp');
    }
}
