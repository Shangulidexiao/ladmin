<!DOCTYPE html>
<html lang="zh_CN">
    <!--Head-->
    <head>
        <meta charset="utf-8" />
        <title>长安网-登录</title>

        <meta name="description" content="login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">

        <!--Basic Styles-->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />

        <!--Fonts-->
        <!--     <link href="http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css"> -->

        <!--Beyond styles-->
        <link id="beyond-link" href="{{asset('css/beyond.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
        <link id="skin-link" href="" rel="stylesheet" type="text/css" />
        <!-- <link href="{{asset('css/login.css')}}" rel="stylesheet" /> -->

        <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
        <script src="{{asset('js/skins.min.js')}}"></script>
        <style>
        .loginbox-item{padding-left:0;padding-right:0;}
        .loginbox-code-img{height:34px;padding-right:0;}
        .loginbox-textbox .alert{margin-bottom: 0px;}
        body{ width: 100%;height: 100%;background: url(/img/loginbg.jpg) no-repeat 100% 100%;background-size: cover;text-align:center;}
        body:before{background-color: transparent;}
        .login-title{width:60%;margin:auto;}
        /* .login-title-wapper{position: absolute;top:50px;width: 100%;font-weight: 500;} */
        .login{background:url(/img/login.png)  no-repeat;display:inline-block;}
        .password{height:15px;width:8px;background-position:0 0;margin-top: 9.5px;}
        .user{height:15px;width:15px;background-position:0 -15px;margin-top: 9.5px;}
        .code{height:18px;width:17px;background-position:0 -30px;margin-top:8px;}
        .login-container .loginbox .loginbox-title{text-align:left;padding-left: 40px;}
        .login-form-white{padding:15px 18px;background: rgba(255,255,255,.32);}
        .login-container{margin-bottom: 0;margin-top:30px;margin-top:4%;max-width:none;width:436px;display:inline-block;}
        .login-container .loginbox{width: 400px !important;height: 380px !important;background:rgba(255,255,255,.72);box-shadow:none;}
        .login-title-wapper{margin-top:3.5%;}
        .login-container .loginbox .loginbox-textbox{margin:15px 40px;padding:0;border: 1px solid #d9d9d9;position:relative;}
        .login-icon{width:34px;height:34px;position:absolute;left:0;display:inline-block;text-align:center;vertical-align:middle;background:#f2efef;}
        .login-container .loginbox .loginbox-textbox .form-control{display:inline-block;width:88%;border:none;margin-left:34px;overflow:hidden;}
        </style>
    </head>
    <!--Head Ends-->
    <!--Body-->
    <body>
        <div class="login-title-wapper clearfix">
            <div class="col-lg-12 col-md-12">
            <h1 class="login-title text-center">长安网</h1>
            </div>
        </div>
        <!-- animated fadeInDown -->
        <div class="login-container">
            <div class="login-form-white">
                <div class="loginbox">
                    <form action="{{url('login/login')}}" method="post" class="">
                        {{ csrf_field() }}
                        <div class="loginbox-title margin-bottom-30 padding-top-20">@lang('login.pageName')</div>

                        @if (count($errors) > 0)
                        <div class="loginbox-textbox">
                            <div class="alert alert-danger"><i class="fa fa-fw fa-warning"></i>{{$errors}}</div>
                        </div>
                        @endif

                        <div class="loginbox-textbox">
                            <div class="login-icon"><i class="login user"></i></div>
                            <input type="text" class="form-control"  name="username" placeholder="@lang('login.placeholderName')" />
                        </div>
                        <div class="loginbox-textbox">
                            <div class="login-icon"><i class="login password"></i></div>
                            <input type="password" class="form-control" name="password" placeholder="@lang('login.placeholderPassword')" />
                        </div>
                        <div class="loginbox-textbox clearfix">
                            <div class="login-icon"><i class="login code"></i></div>
                            <div class="col-md-6 loginbox-item">
                                <input type="text" class="form-control" name="code" placeholder="请输入验证码" />
                            </div>
                            <div class="col-md-6 loginbox-code-img captcha-main">
                                <img id="captcha-img" base-src="{{url('captcha')}}" src="{{url('captcha')}}" width="100%" height="100%" alt="">
                            </div>  
                        </div>
                        <div class="loginbox-submit">
                            <input type="submit" class="btn btn-primary btn-block" value="@lang('login.pageLogin')">
                        </div>   
                        <div class="loginbox-submit">
                            <div class="alert alert-warning"><i class="fa fa-fw fa-warning"></i>注：请使用ie9以上的浏览器</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Basic Scripts-->
        <script src="{{asset('js/jquery-2.0.3.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

        <!--Beyond Scripts-->
        <script src="{{asset('js/beyond.min.js')}}"></script>
        <script>
        $('.captcha-main').on('click',function(){
            $('#captcha-img').attr('src', $('#captcha-img').attr('base-src') + '?t=' + Math.random());
        });
        </script>
    </body>
    <!--Body Ends-->
</html>
