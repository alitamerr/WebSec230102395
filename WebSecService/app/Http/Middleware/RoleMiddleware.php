<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager; // Import the AuthManager class
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!$this->auth->check() || !$this->auth->user()->hasRole($role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}