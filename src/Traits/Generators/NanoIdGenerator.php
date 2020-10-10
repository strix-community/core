<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Traits\Generators;

use Hidehalo\Nanoid\Client;

trait NanoIdGenerator
{
    protected static function generateNanoId($secure = true): string
    {
        $nano = new Client();

        $mode = $secure ? Client::MODE_DYNAMIC : Client::MODE_NORMAL;

        return $nano->generateId(21, $mode);
    }
}
