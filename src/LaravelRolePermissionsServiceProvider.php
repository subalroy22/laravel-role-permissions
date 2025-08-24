<?php

namespace Subalroy22\LaravelRolePermissions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasMigration('create_roles_table')
            ->hasMigration('create_permissions_table')
            ->hasMigration('create_role_user_table')
            ->hasMigration('create_permission_user_table')
            ->hasMigration('create_role_has_permissions_table');
    }

    public function boot(): void{
        $router = $this->app['router'];

        $router->aliasMiddleware('role', \Subalroy22\LaravelRolePermissions\Middleware\RoleMiddleware::class);
        $router->aliasMiddleware('permission', \Subalroy22\LaravelRolePermissions\Middleware\PermissionMiddleware::class);
    }
}
