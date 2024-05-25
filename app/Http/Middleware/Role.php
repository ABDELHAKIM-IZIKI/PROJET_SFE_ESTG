<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role ): Response   
    {

        if ( !Auth::check() || Auth::user()->role->nom !== $role || Auth::user()->role == 'Avec no role' ) {
             
            return redirect()->route('Banned');
        
        }

        return $next($request);
    }
}
