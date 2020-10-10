<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Traits\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    /**
     * Any model that is in the creating / bootable state will have a slug created for their slug field.
     */
    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            $model->{static::getSlugKey()} = static::generateSlug($model);
        });
    }

    /**
     * Get the key that we'll slug.
     *
     * @return string
     */
    protected static function getSlugKey(): string
    {
        return 'slug';
    }

    /**
     * Get the initial key that we'll use to make the slug.
     *
     * @return string
     */
    protected static function getNamedKey(): string
    {
        return 'name';
    }

    /**
     * If for whatever reason generateSlug() returns a slug that is less than 1 character
     * a fallback column will be used as placeholder.
     *
     * @return string
     */
    protected static function getFallbackKey(): string
    {
        return 'uid';
    }

    /**
     * Generates Slug.
     *
     * @param Model $model
     *
     * @return string
     */
    protected static function generateSlug(Model $model): string
    {
        $slug = Str::slug($model->{static::getNamedKey()});

        if (Str::length($slug) >= 1) {
            return static::processRelatedSlugs($model, $slug);
        }

        return $model->getAttributeValue(static::getFallbackKey());
    }

    /**
     * Search for related slugs on this model, default to Uuid to avoid duplicate slugs.
     *
     * @param Model  $model
     * @param string $slug
     *
     * @return string
     */
    protected static function processRelatedSlugs(Model $model, string $slug): string
    {
        if ($model->where('slug', '=', $slug)->exists()) {
            return $model->getAttributeValue('uid');
        }

        return $slug;
    }
}
