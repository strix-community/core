<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use Strix\View\Components\Button;
use Strix\View\Components\Editor;
use Strix\View\Components\Loader;
use Strix\View\Components\Sections\Backdrop;
use Strix\View\Components\Spacer;

return [

    'enabled_routes' => [
        'web' => false,
        'api' => true,
    ],

    'components' => [
        'button'   => Button::class,
        'editor'   => Editor::class,
        'loader'   => Loader::class,
        'backdrop' => Backdrop::class,
        'spacer'   => Spacer::class,
    ],
];
