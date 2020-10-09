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
use Illuminate\View\Compilers\BladeCompiler;
use Strix\Models\Ability;
use Strix\Models\Role;
use Bouncer;

class StrixServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->setupApplication();
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
        Bouncer::useAbilityModel(Ability\Ability::class);
        Bouncer::useRoleModel(Role\Role::class);
    }

    protected function setupApplication(): void
    {
        $this->loadDefaultConfigFiles();

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'strix');

        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            /** @var BladeComponent $component */
            foreach (config('strix.components') as $alias => $component) {
                $blade->component($component, $alias, null);
            }
        });

        $this->registerTelescope();
    }

    protected function loadDefaultConfigFiles(): void
    {

        $configPath = __DIR__ . '/../../config/*.php';


        $configFiles = glob($configPath);

        foreach ($configFiles as $config) {
            $this->mergeConfigFrom(
                $config,
                pathinfo($config)['filename']
            );
        }
    }

    protected function registerTelescope(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
