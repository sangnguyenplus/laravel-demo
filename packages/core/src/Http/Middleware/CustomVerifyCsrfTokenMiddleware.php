<?php

namespace Org\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomVerifyCsrfTokenMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        return $next($request);
    }
}
