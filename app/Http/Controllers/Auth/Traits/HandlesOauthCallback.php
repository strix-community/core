<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);


namespace Strix\Http\Controllers\Auth\Traits;


use Strix\Models\OAuthProvider\OAuthProvider;
use Strix\Models\User\User;
use Strix\Traits\Generators\NanoIdGenerator;

trait HandlesOauthCallback
{
    use NanoIdGenerator;

    /**
     * @param string $provider
     * @param \Laravel\Socialite\Contracts\User $socialiteUser
     * @return User
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
     */
    protected function findOrCreateUser(string $provider, \Laravel\Socialite\Contracts\User $socialiteUser): User
    {
        $oauthProvider = OAuthProvider::where('provider', $provider)
            ->whereExists(function ($query) use ($socialiteUser) {
                $query->where('provider_user_id', $socialiteUser->getId());
            })
            ->first();

        if ($oauthProvider) {
            $oauthProvider->update([
                'access_token' => $socialiteUser->token,
                'refresh_token' => $socialiteUser->refreshToken,
            ]);

            return $oauthProvider->user;
        }

//        if (User::where('email', $socialiteUser->getEmail())->exists()) {
//           throw new EmailTakenException;
//        }

        return $this->createUser($provider, $socialiteUser);
    }

    /**
     * @param string $provider
     * @param \Laravel\Socialite\Contracts\User $socialiteUser
     * @return User
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
     */
    protected function createUser(string $provider, \Laravel\Socialite\Contracts\User $socialiteUser): User
    {
        $user = User::create([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
        ]);

        $user->markEmailAsVerified();

        $avatar = $socialiteUser->getAvatar();

        $user->addMediaFromUrl($avatar)
            ->sanitizingFileName(function($avatar) {
                return static::generateNanoId(false) . '.' .  \File::extension($avatar);
            })
            ->toMediaCollection('avatar');

        $user->oauthProviders()->create([
            'provider' => $provider,
            'provider_user_id' => $socialiteUser->getId(),
            'access_token' => $socialiteUser->token,
            'refresh_token' => $socialiteUser->refreshToken,
        ]);

        return $user;
    }
}
