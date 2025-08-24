<?php

namespace Subalroy22\LaravelRolePermissions\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class PermissionCacheReset extends Command
{
    protected $signature = 'permission:cache-reset';
    protected $description = 'Clear cached permissions for all users';

    public function handle()
    {
        $userModel = config('auth.providers.users.model', \App\Models\User::class);

        if (!class_exists($userModel)) {
            $this->error('User model not found. Please configure auth.providers.users.model.');
            return 1;
        }

        $users = $userModel::all();

        foreach ($users as $user) {
            if (method_exists($user, 'forgetCachedPermissions')) {
                $user->forgetCachedPermissions();
            }
        }

        $this->info('Permission cache cleared successfully.');
        return 0;
    }
}
