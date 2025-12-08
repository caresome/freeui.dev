<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Category extends Model
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
        return base_path('content/categories');
    }

    public static function schema(Blueprint $table): void
    {
        $table->string('slug')->primary();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('icon')->nullable();
    }

    /**
     * Get the components in this category.
     */
    public function components(): HasMany
    {
        return $this->hasMany(Component::class, 'category', 'slug');
    }
}
