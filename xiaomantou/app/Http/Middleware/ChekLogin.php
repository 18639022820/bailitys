<?php

namespace App\Http\Middleware;

use Closure;

class ChekLogin
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
        if(!session('user')){
            return response()->json(Ajax('9','还没登录',''));
        }
        $site = session('user');
        //var_dump($site);
        $request->userinfo =$site;
        return $next($request);
    }
}
