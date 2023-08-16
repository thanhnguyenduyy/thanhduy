<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if (auth()->user()->name === 'admin') {
                return $next($request);
            }
        } catch (\Throwable $th) {
            abort(403, 'Unauthorized');
        }
    }
}
