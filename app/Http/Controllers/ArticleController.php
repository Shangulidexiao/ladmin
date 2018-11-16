<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Log;

use App\Model\Admin\Article as ArticleModel;
use App\Model\Admin\Category as CategoryModel;
use App\Model\Admin\Admin as AdminModel;

class ArticleController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     = $request->input('search');
        $articleModel       = ArticleModel::where('isDel',0);
        if($search){
            $articleModel->where(function($query) use ($search) {
                $query->orWhere('title', 'like', "%{$search}%");
            });
        }
        $articles = $articleModel->orderBy('orderBy', 'desc')->paginate(10);

        $categoryModel                  = new CategoryModel();
        $viewData['categorys']        = $categoryModel->getAll(['kv' => 1]);
        $viewData['search'] = $search;
        $viewData['adder']  = (new AdminModel)->adminByIds($articles);
        $viewData['list']   = $articles;
        $viewData['title']  = '文章列表';
        $viewData['show']   = config('admin.show');
        return view('article/index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['show']               = config('admin.show');
        $viewData['title']              = '创建文章';
        $categoryModel                  = new CategoryModel();
        $viewData['topCategory']        = $categoryModel->getTop();
        return view('article/create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ArticleModel $articleModel)
    {
        $this->validate($request, [
    		'title' 	=> 'required',
    		'topId' 	=> 'integer',
    		'content'  	=> 'required',
    	]);
        
        $articleId = $articleModel->create([
            'title'      => (string)$request->input('title'),
            'subTitle'   => (string)$request->input('subTitle'),
            'keywords'   => (string)$request->input('keywords'),
            'intro'      => (string)$request->input('intro'),
            'content'    => (string)$request->input('content'),
            'orderBy'    => (int)$request->input('orderBy'),
            'isShow'     => (int)$request->input('isShow'),
            'topId'    	 => (int)$request->input('topId'),
            'subId'      => (int)$request->input('subId'),
            'adder'      => (int)$request->adminInfo['id'],
        ]);
        Log::info('创建文章-创建者：' . $request->adminInfo['userName'] . '-'.$articleId);
        return redirect('article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subCate(Request $request, CategoryModel $categoryModel)
    {
		$topId = $request->input('val');
		$selId = $request->input('sel');
        $subCate = [];
        if($topId){
            $subCate = $categoryModel->getSub(['kv'=>1, 'pId' => $topId]);
        }
        return parent::createOption($subCate, $selId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articleModel           = new ArticleModel();
		$categoryModel			= new CategoryModel();

        $viewData['article']    = $article = ArticleModel::findOrFail($id);
		$viewData['topCategory']= $categoryModel->getTop(['kv'=>1]);
		$viewData['subCategory']= $categoryModel->getSub(['kv'=>1]);
        $viewData['title']      = '编辑文章';
        $viewData['show']       = config('admin.show');
        return view('article/edit', $viewData);

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
    		'title' 	=> 'required',
    		'topId' 	=> 'integer',
    		'content'  	=> 'required',
    	]);
        
        $articleModel               = ArticleModel::findOrFail((int)$id);
        $articleModel->title        = (string)$request->input('title');
        $articleModel->subTitle		= (string)$request->input('subTitle');
        $articleModel->keywords     = (string)$request->input('keywords');
        $articleModel->intro		= (string)$request->input('intro');
        $articleModel->content		= (string)$request->input('content');
        $articleModel->orderBy      = (int)$request->input('orderBy');
        $articleModel->isShow       = (int)$request->input('isShow');
        $articleModel->topId        = (int)$request->input('topId');
        $articleModel->subId        = (int)$request->input('subId');
        $articleModel->save();
        Log::info('修改文章-修改者：'.$request->adminInfo['userName'].'-'.$id);
        return redirect('article');
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
        $articleModel               = ArticleModel::findOrFail((int)$id);
        $articleModel->isDel        = 1;
        $articleModel->updateTime   = time();
        $articleModel->save();
        Log::info('删除文章-删除者：'.$request->adminInfo['userName'].'-'.$articleModel['id']);
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
        $isSuccess = ArticleModel::whereIn('id',$ids)->update(['isDel'=>1, 'updateTime'=>time()]);
        Log::info('删除文章-删除者：'.$request->adminInfo['userName'].'-'. implode(',', $ids));
        if($isSuccess){
            return ['status'=>1,'msg'=>'删除成功'];
        }else{
            return ['status'=>0,'msg'=>'删除失败'];
        }
    }
}
