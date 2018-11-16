<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\CommonController;

class IndexController extends CommonController
{
    public function index(Request $request)
    {
        $viewData['title'] = '首页';
        return view('admin/index', $viewData);
    }
}
