<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Providers;

use Illuminate\Support\ServiceProvider;
use Strix\Models\Ability;
use Strix\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->bootBouncerModels();
    }

    /**
     * Boots bouncer to use custom ability / roles
     *
     * @return void
     */
    public function bootBouncerModels(): void
    {
        \Bouncer::useAbilityModel(Ability\Ability::class);
        \Bouncer::useRoleModel(Role\Role::class);
    }
}
