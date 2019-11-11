<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;

class AutoCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route_name = $request->route()->getName();
        $permission = Permission::whereRaw("FIND_IN_SET ('$route_name',routes)")->first();
        if($permission)
        {
            if(!$request->user()->can->($permission->name))
            {
                abort(403);
            }
        }
        return $next($request);
    }
}
