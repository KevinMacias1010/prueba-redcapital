<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Permite solo a usuarios admin (boolean true).
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user || !$user->admin) {
            abort(403, 'Acceso solo para administradores');
        }
        return $next($request);
    }
}


