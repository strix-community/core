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
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Strix\Models\Ability;
use Strix\Models\Role;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class StrixServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if (! defined('STRIX_PATH')) {
            define('STRIX_PATH', realpath(__DIR__ . '/../../'));
        }

        $this->loadConfigurationFiles();
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
        foreach (Finder::create()->files()->name('*.php')->in(realpath(STRIX_PATH . '/config')) as $config) {
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

        $viewPath = STRIX_PATH . '/resources/views';

        View::share('strixAssetVersion', md5_file(STRIX_PATH . '/public/themes/Strix/mix-manifest.json'));

        $this->loadViewsFrom($viewPath, 'strix');

        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            /** @var BladeComponent $component */
            foreach (config('strix.components') as $alias => $component) {
                $blade->component($component, $alias, null);
            }
        });
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    public function registerAssets(): void
    {
        $this->publishes([
            STRIX_PATH . '/public' => public_path(),
        ], 'strix-assets');
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing(): void
    {
        if (!$this->app->runningInConsole()) return;

        $files = [];

        foreach (Finder::create()->files()->name('*.php')->in(realpath(STRIX_PATH . '/config')) as $config) {
            $configPath = $config->getRealPath();

            $publishedConfigPath = config_path($config->getFilename());

            $files[$configPath] = $publishedConfigPath;
        }

        $this->publishes($files, 'strix-config');
    }
}
