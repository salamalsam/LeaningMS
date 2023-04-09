<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOrTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->path() === 'login') {
            return $next($request);
        }
        
        if (auth()->user() && (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)) {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', "You don't have admin or Teacher access.");
    }
}
