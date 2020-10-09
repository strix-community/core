<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Socialite;
use Strix\Http\Controllers\Auth\Traits\HandlesOauthCallback;
use Strix\Http\Controllers\Controller;
use Strix\Http\Resources\Users\DefaultUserResource;
use Strix\Models\User\User;

class OAuthController extends Controller
{
    use HandlesOauthCallback;

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param  string $provider
     * @return \Illuminate\Http\JsonResponse
     */
    public function redirectToProvider(string $provider): JsonResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param string $provider
     * @return DefaultUserResource
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
     */
    public function handleProviderCallback(string $provider): User
    {
        $user = Socialite::driver($provider)->user();

        $user = $this->findOrCreateUser($provider, $user);

        \Auth::login($user, true);

        return $user;
    }
}
