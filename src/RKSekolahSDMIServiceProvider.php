<?php

namespace Bantenprov\RKSekolahSDMI;

use Illuminate\Support\ServiceProvider;
use Bantenprov\RKSekolahSDMI\Console\Commands\RKSekolahSDMICommand;

/**
 * The RKSekolahSDMIServiceProvider class
 *
 * @package Bantenprov\RKSekolahSDMI
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RKSekolahSDMIServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rk-sekolah-sd-mi', function ($app) {
            return new RKSekolahSDMI;
        });

        $this->app->singleton('command.rk-sekolah-sd-mi', function ($app) {
            return new RKSekolahSDMICommand;
        });

        $this->commands('command.rk-sekolah-sd-mi');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'rk-sekolah-sd-mi',
            'command.rk-sekolah-sd-mi',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('rk-sekolah-sd-mi.php');

        $this->mergeConfigFrom($packageConfigPath, 'rk-sekolah-sd-mi');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'rk-sekolah-sd-mi');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/rk-sekolah-sd-mi'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'rk-sekolah-sd-mi');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/rk-sekolah-sd-mi'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'rk-sekolah-sd-mi-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'rk-sekolah-sd-mi-public');
    }
}
