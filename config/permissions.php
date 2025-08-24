<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Guard
    |--------------------------------------------------------------------------
    |
    | The default guard that will be used for role and permission checks.
    |
    */
    'default_guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Cache Settings
    |--------------------------------------------------------------------------
    |
    | You can configure the cache key and expiration time for permissions.
    |
    */
    'cache' => [
        'key' => 'user_permissions',
        'ttl' => 60, // minutes
    ],

];
