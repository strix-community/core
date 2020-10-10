<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Models\Role;

use Strix\Traits\Models\HasNanoId;

/**
 * Strix\Models\Role\Role.
 *
 * @property int                             $id
 * @property string                          $uid
 * @property string                          $name
 * @property string|null                     $title
 * @property int|null                        $level
 * @property int|null                        $scope
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Ability\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\User\User[] $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Silber\Bouncer\Database\Role whereAssignedTo($model, $keys = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereScope($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Role\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends \Silber\Bouncer\Database\Role
{
    use HasNanoId;
}
