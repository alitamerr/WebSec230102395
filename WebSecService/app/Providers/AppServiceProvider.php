<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Models\Product;
use App\Policies\ProductPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * This replaces the manual policy registration in the boot method for these models.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
        
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register Spatie's middleware
        $this->app->singleton(RoleMiddleware::class);
        $this->app->singleton(PermissionMiddleware::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define a simple gate. Consider moving complex checks to policies.
        Gate::define('manage-users', function ($user) {
            return $user->hasRole('admin');
        });
    }
}
