<?php

namespace Org\Core\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DemoMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        info('This request triggers middleware ' . get_class($this));

        return $next($request);
    }
}
