<?php

namespace Ministrare\LaravelCorePackage\Providers;

use Illuminate\Support\ServiceProvider;
use Ministrare\LaravelCorePackage\Library\Breadcrumb;
use Ministrare\LaravelCorePackage\Library\Form;
use Ministrare\LaravelCorePackage\Library\Utilities;


class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('breadcrumb', function($app) {
            return new Breadcrumb;
        });
        $this->app->bind('utilities', function($app) {
            return new Utilities;
        });
        $this->app->bind('form', function($app) {
            return new Form;
        });

        info('Ministrare/LaravelPackageCore is loaded!');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-core-package');
    }
}
