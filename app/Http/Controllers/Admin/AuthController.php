<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Admin\CommonController;
use App\Model\Admin\Auth as AuthModel;
use App\Model\Admin\Admin as AdminModel;

class AuthController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     = $request->input('search');
        $auth       = AuthModel::where('isDel',0);
        if($search){
            $auth->where(function($query) use ($search) {
                $query->orWhere('name', 'like', "%{$search}%");
            });
        }
        $auths = $auth->orderBy('id', 'desc')->paginate(10);

        $viewData['adder']  = (new AdminModel)->adminByIds($auths);
        $viewData['search'] = $search;
        $viewData['list']   = $auths;
        $viewData['title']  = '菜单管理列表';
        $viewData['show']   = config('admin.show');
        return view('admin/auth/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pId        = $request->input('pId');
        $authModel       = new AuthModel();
        $tree       = $authModel->createTree(AuthModel::where('isDel',0)->get());
        $viewData['title']      = '创建菜单';
        $viewData['show']       = config('admin.show');
        $viewData['pId']        = $pId;
        $viewData['treeStr']    = $authModel->formatTree($tree,$pId);
        return view('admin/auth/create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AuthModel $authModel)
    {
        $this->validate($request, [
    		'name' => 'required',
    		'url'  => 'required',
        ]);
        
        $authId = $authModel->create([
            'name'      => (string)$request->input('name'),
            'icon'      => (string)$request->input('icon'),
            'url'       => (string)$request->input('url'),
            'orderBy'   => (int)$request->input('orderBy'),
            'isShow'    => (int)$request->input('isShow'),
            'parentId'  => (int)$request->input('pId'),
            'adder'     => (int)$request->adminInfo['id'],
            'resource'  => (int)$request->input('route'),
        ]);
        Log::info('创建菜单-创建者：'.$request->adminInfo['userName'].'-'.$authId);
        return redirect('admin/auth');
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
        $authModel              = new AuthModel();
        $tree                   = $authModel->createTree(AuthModel::where('isDel',0)->get());
        $viewData['title']      = '编辑菜单';
        $viewData['menu']       = $menu = AuthModel::findOrFail($id);
        $viewData['show']       = config('admin.show');
        $viewData['pId']        = $menu['parentId'];
        $viewData['treeStr']    = $authModel->formatTree($tree, $menu['parentId']);
        return view('admin/auth/edit', $viewData);
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
    		'name' => 'required',
    		'url'  => 'required',
    	]);
        
        $authModel              = AuthModel::findOrFail((int)$id);
        $authModel->name        = (string)$request->input('name');
        $authModel->icon        = (string)$request->input('icon');
        $authModel->url         = (string)$request->input('url');
        $authModel->parentId    = (int)$request->input('pId');
        $authModel->orderBy     = (int)$request->input('orderBy');
        $authModel->isShow      = (int)$request->input('isShow');
        $authModel->save();
        Log::info('修改菜单-修改者：'.$request->adminInfo['userName'].'-'.$id);
        return redirect('admin/auth');
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
        $authModel          = AuthModel::findOrFail((int)$id);
        $authModel->isDel        = 1;
        $authModel->updateTime   = time();
        $authModel->save();
        Log::info('删除菜单-删除者：'.$request->adminInfo['userName'].'-'.$authModel['id']);
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
        $isSuccess = AuthModel::whereIn('id',$ids)->update(['isDel'=>1]);
        if($isSuccess){
            return ['status'=>1,'msg'=>'删除成功'];
        }else{
            return ['status'=>0,'msg'=>'删除失败'];
        }
    }
}
