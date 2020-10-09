<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Strix\Traits\Models\HasNanoId;
use Strix\Traits\Models\HasSlug;

/**
 * Strix\Models\Category\Category
 *
 * @property int $id
 * @property string $uid
 * @property string $title
 * @property string $slug
 * @property mixed|null $description
 * @property int $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Category\Category whereWeight($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\Strix\Models\Category\Category onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Strix\Models\Category\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Strix\Models\Category\Category withoutTrashed()
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereType($value)
 */
class Category extends Model
{
    use HasNanoId, HasSlug, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'uid', 'title', 'description', 'slug', 'weight', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

}
