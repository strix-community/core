<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Strix\Models\OAuthProvider\OAuthProvider;
use Strix\Models\Thread\Thread;
use Strix\Traits\Media\CachesMediaUrl;
use Strix\Traits\Models\HasComments;
use Strix\Traits\Models\HasNanoId;
use Strix\Traits\Models\HasSlug;

/**
 * Strix\Models\User\User.
 *
 * @property int                             $id
 * @property string                          $uid
 * @property string                          $name
 * @property string                          $slug
 * @property string                          $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null                     $password
 * @property string|null                     $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Ability\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Comment\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Media\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\OAuthProvider\OAuthProvider[] $oauthProviders
 * @property-read int|null $oauth_providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Role\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereIsNot($role)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\User\User whereUpdatedAt($value)
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Strix\Models\Thread\Thread[] $threads
 * @property-read int|null $threads_count
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 */
class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable;
    use HasNanoId;
    use InteractsWithMedia;
    use HasRolesAndAbilities;
    use CachesMediaUrl;
    use HasSlug;
    use HasComments;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'slug', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Registers the media collections the user will have.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();

        $this->addMediaCollection('cover')
            ->singleFile();

        $this->addMediaCollection('cover.post')
            ->singleFile();
    }

    /**
     * Get the oauth providers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oauthProviders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OAuthProvider::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
