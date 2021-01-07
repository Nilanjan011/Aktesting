<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->userType =='staff'){
            return $next($request);
        }
        
        return back();
    }
}
