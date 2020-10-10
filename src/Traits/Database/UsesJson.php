<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Traits\Database;

use DB;
use PDO;

trait UsesJson
{
    /**
     * The version to compare the server against.
     *
     * @var string
     */
    protected static string $version = '5.7.8';

    /**
     * Detects if we can use a json table for the most common DB engine.
     * Thanks https://github.com/rinvex/laravel-categories for this snippet.
     *
     * @return string
     */
    public static function jsonable(): string
    {
        $driverName = DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);

        $dbVersion = DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION);

        $isOldVersion = version_compare($dbVersion, static::$version, 'lt');

        return $driverName === 'mysql' && $isOldVersion ? 'text' : 'json';
    }
}
