<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Models\OAuthProvider;

use Illuminate\Database\Eloquent\Model;
use Strix\Models\User\User;
use Strix\Traits\Models\HasNanoId;

/**
 * Strix\Models\OAuthProvider\OAuthProvider
 *
 * @property int $id
 * @property string $uid
 * @property int $user_id
 * @property string $provider
 * @property string $provider_user_id
 * @property string|null $access_token
 * @property string|null $refresh_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Strix\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\OAuthProvider\OAuthProvider whereUserId($value)
 * @mixin \Eloquent
 */
class OAuthProvider extends Model
{
    use HasNanoId;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'oauth_providers';

    protected $fillable = [
        'provider', 'provider_user_id', 'access_token', 'refresh_token', 'profile_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'access_token', 'refresh_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
