<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Models\Ability;

use Strix\Traits\Models\HasNanoId;

/**
 * Strix\Models\Ability\Ability.
 *
 * @property int                             $id
 * @property string                          $uid
 * @property string                          $name
 * @property string|null                     $title
 * @property int|null                        $entity_id
 * @property string|null                     $entity_type
 * @property bool                            $only_owned
 * @property array                           $options
 * @property int|null                        $scope
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $identifier
 * @property-read string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Role\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\User\User[] $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Silber\Bouncer\Database\Ability byName($name, $strict = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\Silber\Bouncer\Database\Ability forModel($model, $strict = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Silber\Bouncer\Database\Ability simpleAbility()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereOnlyOwned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereScope($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Ability\Ability whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ability extends \Silber\Bouncer\Database\Ability
{
    use HasNanoId;
}
