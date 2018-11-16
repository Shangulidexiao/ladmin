<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Admin\CommonController;
use App\Model\Admin\Category as CategoryModel;
use App\Model\Admin\Admin as AdminModel;

class CategoryController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     = $request->input('search');
        $auth       = CategoryModel::where('isDel',0);
        $viewData   = [];
        if($search){
            $auth->where(function($query) use ($search) {
                $query->orWhere('name', 'like', "%{$search}%");
            });
        }
        $auths = $auth->orderBy('orderBy', 'desc')->paginate(10);

        $viewData['adder']  = (new AdminModel)->adminByIds($auths);
        $viewData['search'] = $search;
        $viewData['list']   = $auths;
        $viewData['title']  = '文章类别列表';
        $viewData['show']   = config('admin.show');
        return view('category/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryModel       = new CategoryModel();
        $viewData['title']      = '创建文章类别';
        $viewData['topCategory']      = $categoryModel->getTop();
        $viewData['show']       = config('admin.show');
        return view('category/create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $categoryModel)
    {
        $this->validate($request, [
    		'name' => 'required',
    	]);
        $cateId = $categoryModel->create([
            'name'      => (string)$request->input('name'),
            'orderBy'   => (int)$request->input('orderBy'),
            'isShow'    => (int)$request->input('isShow'),
            'pId'  => (int)$request->input('pId'),
        ]);
        Log::info('创建文章类别-创建者：'.$request->adminInfo['userName'].'-'.$cateId);
        return redirect('admin/category');
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
        $categoryModel       = new CategoryModel();
        $viewData['topCategory']      = $categoryModel->getTop();
        $viewData['title']      = '编辑文章类别';
        $viewData['category']   = $category = CategoryModel::findOrFail($id);
        $viewData['show']       = config('admin.show');
        $viewData['pId']        = $category['pId'];
        return view('category/edit', $viewData);
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
    	]);
        
        $categoryModel          = CategoryModel::findOrFail((int)$id);
        $categoryModel->name        = (string)$request->input('name');
        $categoryModel->pId         = (int)$request->input('pId');
        $categoryModel->orderBy     = (int)$request->input('orderBy');
        $categoryModel->isShow      = (int)$request->input('isShow');
        $categoryModel->save();
        Log::info('修改文章类别-修改者：'.$request->adminInfo['userName'].'-'.$id);
        return redirect('admin/category');
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
        $categoryModel               = CategoryModel::findOrFail((int)$id);
        $categoryModel->isDel        = 1;
        $categoryModel->updateTime   = time();
        $categoryModel->save();
        Log::info('删除文章类别-删除者：'.$request->adminInfo['userName'].'-'.$categoryModel['id']);
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
        $isSuccess = CategoryModel::whereIn('id',$ids)->update(['isDel'=>1, 'updateTime'=>time()]);
        Log::info('删除文章类别-删除者：'.$request->adminInfo['userName'].'-'. implode(',', $ids));
        if($isSuccess){
            return ['status'=>1,'msg'=>'删除成功'];
        }else{
            return ['status'=>0,'msg'=>'删除失败'];
        }
    }
}
