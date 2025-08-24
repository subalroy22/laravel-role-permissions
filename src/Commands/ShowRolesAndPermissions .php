<?php

namespace Subalroy22\LaravelRolePermissions\Commands;

use Illuminate\Console\Command;
use Subalroy22\LaravelRolePermissions\Models\Permission;
use Subalroy22\LaravelRolePermissions\Models\Role;

class ShowRolesAndPermissions extends Command
{
    protected $signature = 'permission:show';

    protected $description = 'Display all roles and permissions';

    public function handle()
    {
        $this->info('Roles:');
        Role::all()->each(fn ($role) => $this->line("- {$role->name}"));

        $this->info("\nPermissions:");
        Permission::all()->each(fn ($permission) => $this->line("- {$permission->name}"));
    }
}
