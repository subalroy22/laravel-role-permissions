<?php

use Illuminate\Support\Facades\Schema;

it('runs the package migrations successfully', function () {
    expect(Schema::hasTable('roles'))->toBeTrue();
    expect(Schema::hasTable('permissions'))->toBeTrue();
    expect(Schema::hasTable('role_user'))->toBeTrue();
    expect(Schema::hasTable('permission_user'))->toBeTrue();
    expect(Schema::hasTable('role_has_permissions'))->toBeTrue();
});
