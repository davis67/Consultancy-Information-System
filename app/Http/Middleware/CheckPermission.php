<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\User;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (User::hasPermision(explode('|', $permission))) {
            return $next($request);
        }
        Session::flash('info', 'Oppps..!!!You are not Allowed to access this page.');

        return back();
    }
}
