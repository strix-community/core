<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);


namespace Strix\Generators;


use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

class MediaPathGenerator extends DefaultPathGenerator
{
    /*
 * Get a unique base path for the given media.
 */
    protected function getBasePath(Media $media): string
    {
        return $media->getAttribute('uid');
    }
}
