<?php

namespace Subalroy22\LaravelRolePermissions\Commands;

use Illuminate\Console\Command;

class LaravelRolePermissionsCommand extends Command
{
    public $signature = 'laravel-role-permissions';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
