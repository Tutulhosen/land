<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class CheckInstallation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if system is installed
        if (!File::exists(storage_path('installed'))) {
            // Prevent infinite redirect loop
            if (!$request->is('setup*')) {
                return redirect()->route('setup.welcome');
            }
        }

        return $next($request);
    }
}
