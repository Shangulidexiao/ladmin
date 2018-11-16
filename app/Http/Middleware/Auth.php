<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

use App\Model\Admin\Auth as AuthModel;
use App\Model\Admin\RoleAuth as RoleAuthModel;

class Auth
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
        $authModel = new AuthModel();
        $authIds = $authModel->getAuthIdsByAdminId($request->adminInfo->id);
        //当前路由名字
        $routeName = Route::currentRouteName();
        $currentAuthId = $authModel->getAuthIdByRouteName($routeName);
        
        if(!is_array($authIds) || !in_array($currentAuthId, $authIds)){
            return redirect('admin/admin/default');
        }
        return $next($request);
    }
}
