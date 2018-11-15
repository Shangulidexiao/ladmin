<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; 

use App\Http\Controllers\CommonController;
use App\Model\Admin\Admin       as AdminModel;
use App\Model\Admin\Role        as RoleModel;
use App\Model\Admin\AdminRole   as AdminRoleModel;

class AdminController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $admin = AdminModel::where('isDel',0);
        $viewData = [];
        if($search){
            $viewData['search'] = $search;
            $admin->where(function($query) use ($search) {
                $query->orWhere('userName', 'like', "%{$search}%")
                        ->orWhere('trueName', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('mobile', 'like', "%{$search}%");
            });
        }
        
        $admins = $admin->orderBy('orderBy', 'desc')->paginate(10);
        $viewData['adder'] = (new AdminModel)->adminByIds($admins);
        $viewData['list'] = $admins;
        $viewData['title'] = '人员管理列表';
        return view('admin/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleIdName = (new RoleModel())->idNames();
        $viewData['title'] = '创建管理员';
        $viewData['roleName'] = $roleIdName;
        return view('admin/create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AdminModel $admin)
    {
        $this->validate($request, [
    		'userName'  => 'required|min:5|max:20',
    		'password'  => 'required|min:5|max:20',
    		'mobile'    => 'required',
    		'email'     => 'email',
    	]);
        
        if ($admin->exist($request->input('userName'))){
            return back()->withInput();
        }
        
        $adminId = $admin->create([
            'userName'  => (string)$request->input('userName'),
            'trueName'  => (string)$request->input('trueName'),
            'password'  => (string)$request->input('password'),
            'mobile'    => (string)$request->input('mobile'),
            'email'     => (string)$request->input('email'),
            'adder'     => $request->adminInfo['id'],
        ]);
        
        #添加用户角色
        $adminRole = new AdminRoleModel();
        $roleIds = $request->input('roleId');
        
        if($roleIds){
            $adminRole->addRole($adminId, $roleIds, $request->adminInfo['id']);
        }
        
        Log::info('创建管理员-创建者：'.$request->adminInfo['userName'].'-'.$adminId);
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin                  = AdminModel::findOrFail((int)$id);
        $roleIdName             = (new RoleModel())->idNames();
        $roleIds                = (new AdminRoleModel())->roleIds($id);
        $viewData['title']      = '编辑管理员';
        $viewData['admin']      = $admin;
        $viewData['roleName']   = $roleIdName;
        $viewData['roleIds']    = $roleIds;
        return view('admin/edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
    		'mobile'    => 'required',
    		'email'     => 'email',
    	]);
        $admin              = AdminModel::findOrFail((int)$id);
        $admin->trueName    = (string)$request->input('trueName');
        $admin->mobile      = (string)$request->input('mobile');
        $admin->email       = (string)$request->input('email');
        $admin->updateTime  = time();
        if($request->has('password')){
            $password       = $request->input('password');
            $repassword     = $request->input('repassword');
            if($password == $repassword){
                $admin->password = Hash::make($password);  
            }
        }
        $admin->save();
        
        #用户角色
        $adminRole = new AdminRoleModel();
        $roleIds = $request->input('roleId');
        if($roleIds){
            $adminRole->updateRole($id, $roleIds, $request->adminInfo['id']);
        }else{
            $adminRole->deleteRole($id);
        }
        Log::info('修改管理员-修改者：'.$request->adminInfo['userName'].'-'.$admin['id']);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$id){
            return ['status'=>0,'msg'=>'删除失败'];
        }
        $adminModel = AdminModel::find((int)$id);
        $adminModel->isDel = 1;
        $adminModel->updateTime = time();
        $adminModel->save();
        Log::info('删除管理员-删除者：'.$request->adminInfo['userName'].'-'.$adminModel['id']);
        return ['status'=>1,'msg'=>'删除成功'];
    }
    
    /**
     * 批量删除
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->input('ids');
        if(count($ids) < 1){
            return ['status'=>0,'msg'=>'删除失败'];
        }
        $isSuccess = AdminModel::whereIn('id',$ids)->update(['isDel'=>1, 'updateTime'=>time()]);
        Log::info('删除管理员-删除者：'.$request->adminInfo['userName'].'-'. implode(',', $ids));
        if($isSuccess){
            return ['status'=>1,'msg'=>'删除成功'];
        }else{
            return ['status'=>0,'msg'=>'删除失败'];
        }
    }
}
