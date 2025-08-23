<?php

namespace Subalroy22\LaravelRolePermissions\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Subalroy22\LaravelRolePermissions\LaravelRolePermissions
 */
class LaravelRolePermissions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Subalroy22\LaravelRolePermissions\LaravelRolePermissions::class;
    }
}
