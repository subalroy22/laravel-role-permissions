<?php

namespace Subalroy22\LaravelRolePermissions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    protected $fillable = ['name', 'guard_name'];

    /**
     * Users that have this permissions
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model') ?? \App\Models\User::class,
            'permission_user'
        );
    }

    /**
     * Roles that have this permission
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'role_has_permissions'
        );
    }
}
