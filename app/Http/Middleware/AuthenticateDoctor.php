<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next)
     {
         if (Auth::guard('doctor')->check()) {
             // User is authenticated as a doctor
             return $next($request);
         }
 
         // Redirect to the login page for doctors
         return redirect()->route('admin.login'); // Adjust the route name accordingly
     }
}
