<?php

namespace Subalroy22\LaravelRolePermissions\Commands;

use Illuminate\Console\Command;
use Subalroy22\LaravelRolePermissions\Models\Role;

class CreateRole extends Command
{
    protected $signature = 'permission:create-role {name}';
    protected $description = 'Create a new role';

    public function handle()
    {
        $name = $this->argument('name');
        $role = Role::firstOrCreate(['name' => $name]);

        if ($role->wasRecentlyCreated) {
            $this->info("Role '{$name}' created successfully");
        } else {
            $this->warn("Role '{$name}' already exists");
        }
    }
}
