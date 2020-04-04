<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class GuestAuthen
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

        \Log::info(auth()->guard('admin')->user());
        \Log::info(auth()->guard('web')->user());
        return $next($request);
    }
}
