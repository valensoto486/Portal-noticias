<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user() || !Auth::user()->hasRole('admin')) {
            return redirect('/'); // SI el user no es admin, se manda a la pagina de inicio
        }

        return $next($request);
    }
}
