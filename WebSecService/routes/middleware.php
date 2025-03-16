<?php

use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

/**
 * Register middleware in Laravel 11
 */
return [
    'web' => [
        RoleMiddleware::class,      // ✅ Register Role Middleware
        PermissionMiddleware::class // ✅ Register Permission Middleware
    ],
];


