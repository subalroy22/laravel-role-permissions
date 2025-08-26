<?php

namespace Subalroy22\LaravelRolePermissions;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Subalroy22\LaravelRolePermissions\Commands\CreatePermission;
use Subalroy22\LaravelRolePermissions\Commands\CreateRole;
use Subalroy22\LaravelRolePermissions\Commands\PermissionCacheReset;
use Subalroy22\LaravelRolePermissions\Commands\ShowRolesAndPermissions;

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
            ->hasConfigFile('permissions')
            ->hasMigration('create_roles_table')
            ->hasMigration('create_permissions_table')
            ->hasMigration('create_role_user_table')
            ->hasMigration('create_permission_user_table')
            ->hasMigration('create_role_has_permissions_table')
            ->hasCommand(CreateRole::class)
            ->hasCommand(CreatePermission::class)
            ->hasCommand(ShowRolesAndPermissions::class)
            ->hasCommand(PermissionCacheReset::class);
    }

    public function boot(): void
    {
        $router = $this->app['router'];

        $router->aliasMiddleware('role', \Subalroy22\LaravelRolePermissions\Middleware\RoleMiddleware::class);
        $router->aliasMiddleware('permission', \Subalroy22\LaravelRolePermissions\Middleware\PermissionMiddleware::class);

        /**
         * Blade directives
         */
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });

        Blade::directive('endrole', function () {
            return '<?php endif; ?>';
        });

        Blade::directive('permission', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->hasPermissionTo({$permission})): ?>";
        });

        Blade::directive('endpermission', function () {
            return '<?php endif; ?>';
        });

        /**
         * Publish config file with config tag
         */
        $this->publishes([
            __DIR__.'/../config/permissions.php' => config_path('permissions.php'),
        ], 'config');

        /**
         * Publish migrations file with migrations tag
         */
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }
}
