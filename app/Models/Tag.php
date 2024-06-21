<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * Get the user's first name.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            // get: fn (string $value) => ucwords(str_replace('_', ' ', $value)),
            set: fn (string $value) => str_replace(' ', '_', strtolower($value)),
        );
    }

    public function displayedName(): string
    {
        return ucwords(str_replace('_', ' ', $this->name));
    }

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class)->withTimestamps();
    }
}