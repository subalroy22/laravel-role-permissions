<?php

namespace Subalroy22\LaravelRolePermissions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = ['name', 'guard_name'];

    /**
     * Users that have this roles
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model') ?? \App\Models\User::class,
            'role_user'
        );
    }

    /**
     * Permissions that associated with this role
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            Permission::class,
            'role_has_permissions'
        );
    }
}
