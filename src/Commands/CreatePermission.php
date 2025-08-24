<?php

namespace Subalroy22\LaravelRolePermissions\Commands;

use Illuminate\Console\Command;
use Subalroy22\LaravelRolePermissions\Models\Permission;

class CreatePermission extends Command
{
    protected $signature = 'permission:create-permission {name}';
    protected $description = 'Create a new permission';

    public function handle()
    {
        $name = $this->argument('name');
        $permission = Permission::firstOrCreate(['name' => $name]);

        if($permission->wasRecentlyCreated)
        {
            $this->info("Permission '{$name}' created successfully");
        } else {
            $this->warn("Permission '{$name}' already exists");
        }
    }
}