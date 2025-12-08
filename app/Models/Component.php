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
 * @property string|null $description
 * @property string|null $content
 * @property string|null $github
 * @property-read string $github_url
 * @property-read string $avatar_url
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
        'description',
        'content',
        'github',
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
        $table->text('description')->nullable();
        $table->text('content')->nullable();
        $table->string('github')->nullable();
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
}
