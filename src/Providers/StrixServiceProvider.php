<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Providers;

use Bouncer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use Strix\Models\Ability;
use Strix\Models\Role;
use Symfony\Component\Finder\Finder;

class StrixServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if (!defined('STRIX_PATH')) {
            define('STRIX_PATH', realpath(__DIR__.'/../../'));
        }

        $this->loadConfigurationFiles();
        $this->configureRoutes();
        $this->registerBlade();
        $this->configurePublishing();
        $this->registerTelescope();
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
     * Boots bouncer to use custom ability / roles.
     *
     * @return void
     */
    public function bootBouncerModels(): void
    {
        Bouncer::useAbilityModel(Ability\Ability::class);
        Bouncer::useRoleModel(Role\Role::class);
    }

    protected function loadConfigurationFiles(): void
    {
        $defaultConfigPath = realpath(STRIX_PATH.'/config');

        foreach (Finder::create()->files()->name('*.php')->in($defaultConfigPath) as $config) {
            $this->mergeConfigFrom(
                $config->getRealPath(),
                (string) Str::of($config->getFilename())->replace('.php', null)
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

    protected function registerBlade(): void
    {
        $viewPath = realpath(STRIX_PATH.'/resources/views');

        $mixManifestPath = realpath(STRIX_PATH.'/public/themes/Strix/mix-manifest.json');

        View::share('strixAssetVersion', md5_file($mixManifestPath));

        $this->loadViewsFrom($viewPath, 'strix');

        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            /** @var BladeComponent $component */
            foreach (config('strix.components') as $alias => $component) {
                $blade->component($component, $alias, null);
            }
        });
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $configFiles = [];

        $defaultConfigPath = realpath(STRIX_PATH.'/config');

        foreach (Finder::create()->files()->name('*.php')->in($defaultConfigPath) as $config) {
            $configPath = $config->getRealPath();

            $publishedConfigPath = config_path($config->getFilename());

            $configFiles[$configPath] = $publishedConfigPath;
        }

        $this->publishes(
            $configFiles,
            'strix-config'
        );

        $this->publishes([
            realpath(STRIX_PATH.'/resources/views') => resource_path('views'),
        ], 'strix-views');

        $this->publishes([
            realpath(STRIX_PATH.'/public') => public_path(),
        ], 'strix-assets');

        $this->publishes([
            realpath(STRIX_PATH.'/routes/strix.php') => base_path('routes/strix.php'),
        ], 'strix-routes');
    }

    protected function configureRoutes(): void
    {
        $defaultWebRoutesPath = realpath(STRIX_PATH.'/routes/strix-web.php');

        $defaultApiRoutesPath = realpath(STRIX_PATH.'/routes/strix-api.php');

        if (config('strix.enabled_routes.web') === true) {
            Route::group([
                'middleware' => 'web',
                'namespace'  => '\\Strix',
            ], function () use ($defaultWebRoutesPath) {
                $this->loadRoutesFrom($defaultWebRoutesPath);
            });
        }

        if (config('strix.enabled_routes.api') === true) {
            Route::group([
                'middleware' => 'api',
                'namespace'  => '\\Strix',
            ], function () use ($defaultApiRoutesPath) {
                $this->loadRoutesFrom($defaultApiRoutesPath);
            });
        }
    }
}
