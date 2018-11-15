<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;


class LoginController extends Controller
{
    //
    public function index()
    {
    	return view('login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|min:5|max:20',
    		'password' => 'required|min:5|max:20',
    	]);

    	$username = $request->input('username');
    	$password = $request->input('password');
    	$admin = Admin::where('userName',$username)->first();
    	if(!$admin || !Hash::check($password,$admin->password))
    	{
    		return back()->with('errors','errors')
                ->withInput();
    	}

    	return redirect('default')
                ->cookie('DESGINADMIN',$username,10080,'/')
                ->cookie('DESGINUID',md5($username),10080,'/');
    }
    
    public function logout()
    {
        return redirect('login')
                ->cookie('DESGINADMIN',null,-1,'/')
                ->cookie('DESGINUID',null,-1,'/');
    }
}
