<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware{
    public function handle(Request $request, Closure $next): Response{
        if (auth()->check() && auth()->user()->type === 'admin') {
            return $next($request);
        }
        abort(403, 'Sizda ushbu sahifaga kirish huquqi yo‘q.');
    }
}
