<?php

namespace App\Http\Middleware;

use Closure;

class SWFMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if($request->user()!=null) {
            if ($request->user()->user_type != 'swf') {
                return redirect('/logout');
            }
            return $next($request);
        }
    }
}
