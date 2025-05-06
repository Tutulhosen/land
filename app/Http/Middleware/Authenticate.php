<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        if (Auth::guard('admin')->check()) {
            return route('dashboard');
        } elseif (Auth::guard('employee')->check()) {
            return route('employee-dashboard'); 
        }

        return route('login');
    }


}
