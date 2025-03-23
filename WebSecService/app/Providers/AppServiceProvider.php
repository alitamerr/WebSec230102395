<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use App\Models\User;
use App\Policies\AdminPolicy;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ✅ Register Spatie's middleware
        $this->app->singleton(RoleMiddleware::class);
        $this->app->singleton(PermissionMiddleware::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ✅ Register policies
        Gate::define('manage users', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::policy(User::class, AdminPolicy::class);

        Gate::define('manageRoles', function ($user) {
            return $user->hasRole('admin');
        });
    }
}
