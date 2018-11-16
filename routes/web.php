<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['prefix' => 'admin'], function () {
//不需要登录的后台模块
    Route::group([], function () {
    //验证码
        Route::get('captcha', 'CaptchaController@index');
    //登录
        Route::get('login', 'LoginController@index');
        Route::post('login/login', 'LoginController@login');
    //退出登录
        Route::get('logout', 'LoginController@logout')->name('logout');
        Route::get('/', 'LoginController@index')->name('admin.login');
    });	

//必须登录才能使用
    Route::group(['middleware' => ['admin.login', 'admin.info', 'admin.auth']], function () {
        
        //管理员
        Route::resource('admin', 'AdminController');
        Route::post('admin/deleteAll', 'AdminController@deleteAll')->name('admin.deleteAll');
        
        //权限
        Route::resource('auth', 'AuthController');
        Route::post('auth/deleteAll', 'AuthController@deleteAll')->name('auth.deleteAll');
        
        //角色
        Route::resource('role', 'RoleController');
        Route::post('role/deleteAll', 'RoleController@deleteAll')->name('role.deleteAll');
        
        //文章类别
        Route::resource('category', 'CategoryController');
        Route::post('category/deleteAll', 'CategoryController@deleteAll')->name('category.deleteAll');
        //文章
        Route::get('article/subCate', 'ArticleController@subCate')->name('article.subCate');
        Route::resource('article', 'ArticleController');
        Route::post('article/deleteAll', 'ArticleController@deleteAll')->name('article.deleteAll');
        
        //ueditor 插件上传类类
        Route::any('ueditor/upload', 'UeditorController@upload')->name('ueditor.upload');
        
        //后台首页
        Route::get('default', 'IndexController@index')->name('admin.default');

        //客服管理
        Route::resource('custom', 'CustomController');
        Route::post('custom/deleteAll', 'CustomController@deleteAll')->name('custom.deleteAll');
    });
});

