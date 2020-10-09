<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);


namespace Strix\Traits\Models;


use Strix\Models\Comment;

trait HasComments
{
    /**
     * Returns all comments for this model.
     */
    public function comments()
    {
        return $this->morphMany(Comment\Comment::class, 'commentable');
    }
}
