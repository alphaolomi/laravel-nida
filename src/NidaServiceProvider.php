<?php

namespace Alphaolomi\Nida;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Alphaolomi\Nida\Commands\NidaCommand;

class NidaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /** More info: https://github.com/spatie/laravel-package-tools */         
        $package
            ->name('laravel-nida');
            // ->hasConfigFile()
            // ->hasViews()
            // ->hasMigration('create_laravel-nida_table')
            // ->hasCommand(NidaCommand::class);
    }

    public function packageRegistered()
    {
        $this->app->bind('laravel-nida', function($app) {
            return new Nida();
        });
    }
}
