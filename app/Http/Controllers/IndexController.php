<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\CommonController;

class IndexController extends CommonController
{
    public function index(Request $request)
    {
        $viewData['title'] = '首页';
        return view('index', $viewData);
    }
}
