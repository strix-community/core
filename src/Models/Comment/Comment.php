<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Strix\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use Strix\Traits\Models\HasNanoId;

/**
 * Strix\Models\Comment\Comment.
 *
 * @property int                             $id
 * @property string                          $uid
 * @property string                          $content
 * @property int                             $commenter_id
 * @property string|null                     $commenter_type
 * @property string                          $commentable_type
 * @property string                          $commentable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commenter
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereCommenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereCommenterType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Comment\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use HasNanoId;

    /**
     * The user who posted the comment.
     */
    public function commenter()
    {
        return $this->morphTo();
    }

    /**
     * The model that was commented upon.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
