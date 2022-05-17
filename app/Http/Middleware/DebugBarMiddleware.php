<?php

namespace App\Http\Middleware;

use Closure;
use Request;

class DebugBarMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(config('debugbar.enabled')) {
            $debugbarIPs = config('debugbar.debugbar_ips');
            if(empty($debugbarIPs)){
                \Debugbar::enable();
            }else{
                $debugbarIPs = explode(",", $debugbarIPs);
                if (in_array(Request::ip(), $debugbarIPs)) {
                    \Debugbar::enable();
                } else {
                    \Debugbar::disable();
                }
            }
        }
        return $next($request);
    }
}