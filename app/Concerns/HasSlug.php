<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Automatically generates a unique slug from a source column (default: "title")
 * whenever a model is saved without one. Set an explicit slug to override.
 */
trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::saving(function (Model $model) {
            $source = $model->{static::slugSourceColumn()};

            if (empty($model->slug) && ! empty($source)) {
                $model->slug = static::uniqueSlug(Str::slug($source), $model->getKey());
            }
        });
    }

    protected static function slugSourceColumn(): string
    {
        return 'title';
    }

    protected static function uniqueSlug(string $base, $ignoreId = null): string
    {
        $base = $base !== '' ? $base : 'item';
        $slug = $base;
        $suffix = 1;

        while (
            static::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.(++$suffix);
        }

        return $slug;
    }
}
