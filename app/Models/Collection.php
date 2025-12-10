<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

/**
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property string|null $icon
 */
class Collection extends Model
{
    use HasFactory;
    use Orbital;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'slug';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
    ];

    public static function getOrbitalPath(): string
    {
        return base_path('content/collections');
    }

    public static function schema(Blueprint $table): void
    {
        $table->string('slug')->primary();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('icon')->nullable();
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'collection', 'slug');
    }

    /**
     * Scope to only include collections that have components.
     */
    public function scopeWithComponents(Builder $query): Builder
    {
        return $query->whereHas('categories.components');
    }

    /**
     * Scope to eager load categories with component counts.
     */
    public function scopeWithCategoriesAndCounts(Builder $query): Builder
    {
        return $query->with(['categories' => function ($q): void {
            $q->whereHas('components')->withCount('components');
        }]);
    }
}
