<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

use App\Http\Controllers\CommonController;
use App\Model\Admin\Role        as RoleModel;
use App\Model\Admin\Admin       as AdminModel;
use App\Model\Admin\RoleAuth    as RoleAuthModel;

class RoleController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     = $request->input('search');
        $roleModel       = RoleModel::where('isDel',0);
        if($search){
            $roleModel->where(function($query) use ($search) {
                $query->orWhere('name', 'like', "%{$search}%");
            });
        }
        
        $roles              = $roleModel->orderBy('orderBy', 'desc')->paginate(10);
        $viewData['adder']  = (new AdminModel)->adminByIds($roles);
        $viewData['search'] = $search;
        $viewData['list']   = $roles;
        $viewData['title']  = '角色管理列表';
        return view('role/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title']  = '创建角色';
        $roleModel          = new RoleModel();
        $viewData['zTree']  = json_encode($roleModel->getZTreeData());
        return view('role/create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RoleModel $roleModel)
    {
        $this->validate($request, [
    		'name'      => 'required|min:1|max:255',
    		'orderBy'   => 'integer',
    	]);
        
        if ($roleModel->exist($request->input('name'))){
            return back()->withInput();
        }
        
        $roleId = $roleModel->create([
            'name'      => $request->input('name'),
            'orderBy'   => $request->input('orderBy'),
            'adder'     => $request->adminInfo['id'],
        ]);
        
        $authIds = explode(',', (string)$request->input('authIds'));
        if((string)$request->input('authIds')){
            $roleAuthModel = new RoleAuthModel();
            $roleAuthModel->insertAuthIds($roleId, $authIds);
        }
        Log::info('创建角色-创建者：'.$request->adminInfo['userName'].'-'.$roleId);
        return redirect('admin/role');
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
        $roleModel               = RoleModel::findOrFail((int)$id);
        $viewData['title']  = '编辑管角色';
        $viewData['role']   = $roleModel;
        $roleModel          = new RoleModel();
        $viewData['zTree']  = json_encode($roleModel->getZTreeData($id));
        return view('role/edit', $viewData);
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
    		'name'      => 'required',
    		'orderBy'   => 'integer',
    	]);
        
        $roleModel = RoleModel::find((int)$id);
        if($roleModel){
            $roleModel->name         = $request->input('name');
            $roleModel->orderBy      = $request->input('orderBy');
            $roleModel->updateTime   = time();
            $roleModel->save();
            Log::info('修改角色-修改者：'.$request->adminInfo['userName'].'-'.$id);
        }
        $authIds = explode(',', (string)$request->input('authIds'));
        $roleAuthModel = new RoleAuthModel();
        
        if((string)$request->input('authIds')){
            $roleAuthModel->insertAuthIds($id, $authIds);
        }else{
            $roleAuthModel->deleteAuthIds($id);
        }
        return redirect('admin/role');
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
        
        $roleModel           = RoleModel::find((int)$id);
        $roleModel->isDel    = 1;
        $roleModel->save();
        RoleAuthModel::where('roleId',$id)->delete();
        Log::info('删除角色-删除者：'.$request->adminInfo['userName'].'-'.$id);
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
        $isSuccess = RoleModel::whereIn('id',$ids)->update(['isDel'=>1]);
        RoleAuthModel::whereIn('id',$ids)->delete();
        Log::info('删除角色-删除者：'.$request->adminInfo['userName'].'-'. implode(',', $ids));
        if($isSuccess){
            return ['status'=>1,'msg'=>'删除成功'];
        }else{
            return ['status'=>0,'msg'=>'删除失败'];
        }
    }
}
