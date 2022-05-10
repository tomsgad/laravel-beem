<?php

namespace Tomsgad\Beem;

use Illuminate\Support\Facades\Notification;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tomsgad\Beem\SMS\Beem;
use Tomsgad\Beem\SMS\BeemChannel;

class BeemServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-beem')
            ->hasConfigFile();

        Notification::extend('beem', function ($app): BeemChannel {
            return new BeemChannel(
                $this->app->make(Beem::class)
            );
        });

        $this->app->bind(Beem::class, static function ($app) {
            return new Beem($app['config']['beem']);
        });
    }
}
