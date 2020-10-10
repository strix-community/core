<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Traits\Media;

trait CachesMediaUrl
{
    /**
     * Caches Media urls to avoid duplicate calls.
     *
     * @param string $collectionName
     *
     * @return mixed
     */
    public function getCachedMediaUrl(string $collectionName): string
    {
        return \Cache::remember($this->getMediaCacheKey($collectionName), static::mediaExpiresIn(), function () use ($collectionName) {
            return url($this->getFirstMediaUrl($collectionName));
        });
    }

    /**
     * Forgets media url cache.
     *
     * @param string $collectionName
     *
     * @return bool
     */
    public function flushMediaCache(string $collectionName): bool
    {
        return \Cache::forget($this->getMediaCacheKey($collectionName));
    }

    /**
     * Unique cache key to avoid overriding other cache keys using this trait.
     *
     * @param string $collectionName
     *
     * @return string
     */
    protected function getMediaCacheKey(string $collectionName): string
    {
        return class_basename(static::class).':'.$this->id.':'.$collectionName;
    }

    /**
     * Sets TTL for remember function. Override in base class to change cache time.
     *
     * @return \Carbon\Carbon
     */
    protected static function mediaExpiresIn(): \Carbon\Carbon
    {
        return now()->addMinutes(5);
    }
}
