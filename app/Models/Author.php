<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Author extends Model
{
    use Orbital;

    public static $driver = 'json';

    protected $fillable = [
        'name',
        'email'
    ];

    public static function schema(Blueprint $table): void {
        $table->id();
        $table->string('name');
        $table->string('email');
    }
}
