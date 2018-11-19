<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //
    public function index()
    {
    	return view('admin/login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|min:5|max:20',
    		'password' => 'required|min:5|max:20',
    	]);

    	$username = $request->input('username');
    	$password = $request->input('password');
        $captcha = (string)$request->input('code');
        $sessionCaptcha = (string)$request->session()->get('captcha');
    	$admin = Admin::where('userName',$username)->first();
    	if(!$admin || !Hash::check($password,$admin->password))
    	{
    		return back()->with('errors','errors')
                ->withInput();
    	}
        if(strtolower($captcha) !== strtolower($sessionCaptcha)){
            return back()->with('errors','图片验证码错误')
                ->withInput();
        }

    	return redirect('admin/default')
                ->cookie('DESGINADMIN',$username,10080,'/')
                ->cookie('DESGINUID',md5($username),10080,'/');
    }
    
    public function logout()
    {
        return redirect('admin/login')
                ->cookie('DESGINADMIN',null,-1,'/')
                ->cookie('DESGINUID',null,-1,'/');
    }
}
