<?php

namespace Hydrat\LaravelDbDumper;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Hydrat\LaravelDbDumper\Commands;

class LaravelDbDumperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-db-dumper')
            ->hasConfigFile()
            ->hasCommand(Commands\DbExportCommand::class)
            ->hasCommand(Commands\DbImportCommand::class);
    }
}
