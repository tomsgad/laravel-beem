<?php

namespace Tomsgad\Beem;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tomsgad\Beem\Commands\BeemCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-beem_table')
            ->hasCommand(BeemCommand::class);
    }
}
