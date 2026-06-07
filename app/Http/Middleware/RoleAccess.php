<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAccess
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role;

        if (!in_array($userRole, $roles)) {
            return redirect('/home')->with('error', 'Unauthorized');
        }

        return $next($request);
    }
}