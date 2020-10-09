<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use Laravel\Fortify\Features;

return [
    'guard'     => 'web',
    'passwords' => 'users',
    'username'  => 'email',
    'home'      => '/home',
    'limiters'  => [
        'login' => null,
    ],
    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication(),
    ],
];
