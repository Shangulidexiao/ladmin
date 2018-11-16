<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;

use Closure;
use App\Model\Admin\Admin;
use App\Model\Admin\Auth;

class AdminInfo
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
        //用户的信息
        $adminInfo = Admin::where([['userName',$request->userName],['isDel',0]])->first();
        $auth = new Auth();
        //菜单
        $menus = $auth->getMenu($adminInfo['id']);
        //当前路由名字
        $routeName = Route::currentRouteName();
        //路由命名前缀相同的为一个菜单
        $currentMenu = $auth->currentMenu(preg_replace('/\..*/', '.index', $routeName));
        //一级菜单id 用于菜单展示
        $topMenuId = isset($currentMenu->parentId) ? $currentMenu->parentId : 0; 
        //二级菜单id 用于菜单展示
        $subMenuId = isset($currentMenu->id) ? $currentMenu->id : 0;;
        if(!$adminInfo){
            return redirect('admin/admin/login');
        }
        // 后台页面的管理员信息
        view()->share('adminInfo',$adminInfo);
        view()->share('indexMenus',$menus);
        view()->share('topMenuId',$topMenuId);
        view()->share('subMenuId',$subMenuId);
        $request->adminInfo = $adminInfo;
        return $next($request);
    }
}