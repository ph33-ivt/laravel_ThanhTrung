<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        //dd(\Auth::user(), \Auth::id());
        if (\Auth::check() && \Auth::user()->role_id==1) {
            return $next($request);
        }
        return redirect('/');
    }
}
