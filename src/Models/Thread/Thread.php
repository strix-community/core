<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Models\Thread;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Strix\Models\Board\Board;
use Strix\Models\User\User;
use Strix\Traits\Models\HasComments;
use Strix\Traits\Models\HasNanoId;

/**
 * Strix\Models\Thread\Thread
 *
 * @property int $id
 * @property string $uid
 * @property string $title
 * @property string $slug
 * @property int $comment_count
 * @property mixed $content
 * @property int $board_id
 * @property int $user_id
 * @property string|null $locked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Strix\Models\Board\Board $board
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Comment\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Strix\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereCommentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereLockedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Thread\Thread whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\Strix\Models\Thread\Thread onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Strix\Models\Thread\Thread withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Strix\Models\Thread\Thread withoutTrashed()
 */
class Thread extends Model
{
    use HasNanoId, HasComments, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'title', 'slug', 'content', 'comment_count', 'locked_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
      'locked_at' => 'timestamp'
    ];

    /**
     * Returns board that the thread belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function board(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
