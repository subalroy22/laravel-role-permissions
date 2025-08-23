<?php

namespace Subalroy22\LaravelRolePermissions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Subalroy22\LaravelRolePermissions\Commands\LaravelRolePermissionsCommand;

class LaravelRolePermissionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-role-permissions')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_role_permissions_table')
            ->hasCommand(LaravelRolePermissionsCommand::class);
    }
}
