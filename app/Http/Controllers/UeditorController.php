<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;

class UeditorController extends CommonController
{
    public function upload(Request $request)
    {
        $action = $request->input('action');
        switch ($action) {
            case 'config':
                $result =  json_encode(config('ueditor'));
                break;

            /* 上传图片 */
            case 'uploadimage':
            /* 上传涂鸦 */
            case 'uploadscrawl':
            /* 上传视频 */
            case 'uploadvideo':
            /* 上传文件 */
            case 'uploadfile':
                $result = $this->file($request);
                break;

            /* 列出图片 */
            case 'listimage':
                $result = $this->listImage($request);
                break;
            /* 列出文件 */
            case 'listfile':
                $result = $this->listFile($request);
                break;

            /* 抓取远程文件 */
            case 'catchimage':
                $result = $this->catchImage($request);
                break;

            default:
                $result = json_encode(array(
                    'state'=> '请求地址出错'
                ));
                break;
        }

        /* 输出结果 */
        if (null !== $request->input('callback')) {
            if (preg_match("/^[\w_]+$/", $request->input('callback'))) {
                echo htmlspecialchars($request->input('callback')) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    }
    
    public function file(Request $request)
    {
        $result 		= ["state"=> '', "url"=> '',"title"=> '',"original"=> '',"type"=> '',"size"=> 0];  
        $upFile			= $request->file('upfile');
		if($upFile->getError() == 0) {
			$result['state']	= 'SUCCESS';
        	$upName 			= $request->file('upfile')->store('public');
        	$result['url']      = '/storage/' . $upFile->hashName();
		}else {
			$result['state']	= $upFile->getErrorMessage();
		}
        $result['title']     	= $upFile->hashName();
        $result['original']     = $upFile->getClientOriginalName();
        $result['type']     	= $upFile->getClientOriginalExtension();
        $result['size']     	= $upFile->getSize();
        return json_encode($result);
    }
    
    public function listImage(Request $request)
    {
        return json_encode(array('state'=>'后台不支持此类操作'));
    }
    
    public function listFile(Request $request)
    {
        return json_encode(array('state'=>'后台不支持此类操作'));
    }
    
    public function catchImage(Request $request)
    {
        return json_encode(array('state'=>'后台不支持此类操作'));
    }
}
