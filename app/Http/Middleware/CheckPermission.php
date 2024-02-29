<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role_id = auth()->user()->role_id;
        $role = Role::find($role_id);
        $assigned = [];
        foreach ($role->permissions as $permission){
            array_push($assigned,$permission->id);
        }
        $route_name = $request->route()->getName();
        $permission = Permission::where('route',$route_name)->first();
        if (!$permission){
            abort(404);
        }
        if (!in_array($permission->id,$assigned)){
            abort(404);
        }
        return $next($request);
    }
}
