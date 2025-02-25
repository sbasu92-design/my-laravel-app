<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if request is for the admin panel
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login'); // Redirect admin users
        }

        return $request->expectsJson() ? null : route('login'); // Default login for users
    }
}
