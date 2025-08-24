<?php

namespace Subalroy22\LaravelRolePermissions\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Subalroy22\LaravelRolePermissions\Models\Permission;
use Subalroy22\LaravelRolePermissions\Models\Role;

trait HasRoles
{
    /**
     * Relationships
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_user');
    }

    /**
     * Role Helpers
     */
    public function assignRole($role)
    {
        $role = $role instanceof Role ? $role : Role::where('name', $role)->firstOrFail();
        return $this->roles()->syncWithoutDetaching($role);
    }

    public function removeRole($role)
    {
        $role = $role instanceof Role ? $role : Role::where('name', $role)->firstOrFail();
        return $this->roles()->detach($role);
    }

    public function hasRole($role): bool
    {
        return $this->roles->contains('name', (string) $role);
    }

    /**
     * Permission Helpers
     */
    public function givePermission($permission)
    {
        $permission = $permission instanceof Permission ? $permission : Permission::where('name', $permission)->firstOrFail();
        return $this->permissions()->syncWithoutDetaching($permission);
    }

    public function revokePermission($permission)
    {
        $permission = $permission instanceof Permission ? $permission : Permission::where('name', $permission)->firstOrFail();
        return $this->permissions()->detach($permission);
    }

    public function hasPermissionTo($permission): bool
    {
        return $this->permissions->contains('name', (string) $permission)
            || $this->roles->flatMap->permissions->pluck('name')->contains('name', (string) $permission);
    }

    /**
     * Override laravel's built-in can() method
     */
    public function can($ability, $arguments = []): bool
    {
        return $this->hasPermissionTo($ability) || parent::can($ability, $arguments);
    }
}
