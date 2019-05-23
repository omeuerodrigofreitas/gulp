<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AllowOnlyAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_admin) {
            return $next($request);
        }
        print"Você não tem permissão para ver isso!!!";
        exit();
        abort(403);
    }
}