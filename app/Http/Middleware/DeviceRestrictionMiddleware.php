<?php

namespace App\Http\Middleware;

use Closure;

class DeviceRestrictionMiddleware
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
        $userAgent = $request->header('User-Agent');

        // Kiểm tra nếu User Agent chứa thông tin của điện thoại di động
        if (strpos($userAgent, 'Mobile') !== false) {
            abort(403, 'Access denied on mobile devices.');
        }

        return $next($request);
    }
}
