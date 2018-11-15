<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        $userName = $request->cookie('DESGINADMIN');
        $uId = $request->cookie('DESGINUID');
        
        if ( md5($userName) !== $uId) {
            return redirect('admin/login');
        }
        $request->userName = $userName;
        return $next($request);
    }
}
