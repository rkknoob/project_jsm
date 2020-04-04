<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Log;

class AdminAuthenticate
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

        $admin = Auth::guard('admin')->user();
        if($admin == null){
            return redirect()->guest('backoffice/login');
        }

        return $next($request);
    }
}
