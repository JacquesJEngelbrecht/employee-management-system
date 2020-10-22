<?php

namespace App\Http\Middleware;
use App\Traits\permissionTrait;
use Closure;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    use permissionTrait;

    public function handle($request, Closure $next)
    {
        $this->hasPermission();
        return $next($request);
    }
}
