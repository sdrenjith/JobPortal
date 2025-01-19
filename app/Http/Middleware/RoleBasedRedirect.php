<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleBasedRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $request, Closure $next)
    {

        if ($request->routeIs('register')) {
            return $next($request);
        }
    
        // If the user is not logged in, let them continue to the requested page
        if (!auth()->check()) {
            return $next($request);
        }
    
        
   
        return redirect()->route('login');

        // return $next($request);
    }
    
}
