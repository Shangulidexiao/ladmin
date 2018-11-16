<!DOCTYPE html>
<html lang="zh_CN">
    <!-- Head -->
    <head>
        <meta charset="utf-8" />
        <title>{{ $title }}-@lang('index.pageTitle')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        @stack('metas')
        <link rel="shortcut icon" href="{{asset('img/desginer.png')}}" type="image/x-icon">

        <!--Basic Styles-->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/weather-icons.min.css')}}" rel="stylesheet" />

        <!--Fonts-->

        <!--Beyond styles-->
        <link id="beyond-link" href="{{asset('css/beyond.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/typicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
        <link id="skin-link" href="{{asset('css/skins/blue.min.css')}}" rel="stylesheet" type="text/css" />

        @stack('links')

        <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
        <script src="{{asset('js/skins.min.js')}}"></script>

        @stack('hscripts')
    </head>
    <!-- /Head -->
    <!-- Body -->
    <body>
        <!-- Loading Container -->
        <div class="loading-container">
            <div class="loading-progress">
                <div class="rotator">
                    <div class="rotator">
                        <div class="rotator colored">
                            <div class="rotator">
                                <div class="rotator colored">
                                    <div class="rotator colored"></div>
                                    <div class="rotator"></div>
                                </div>
                                <div class="rotator colored"></div>
                            </div>
                            <div class="rotator"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
        </div>
        <!--  /Loading Container -->
        <!-- Navbar -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="navbar-container">
                    <!-- Navbar Barnd -->
                    <div class="navbar-header pull-left">
                        <a href="#" class="navbar-brand">
                            <small>
                                <img src="{{asset('img/desginerlogo.png')}}" alt="" />
                            </small>
                        </a>
                    </div>
                    <!-- /Navbar Barnd -->

                    <!-- Sidebar Collapse -->
                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="collapse-icon fa fa-bars"></i>
                    </div>
                    <!-- /Sidebar Collapse -->
                    <!-- Account Area and Settings -->
                    <div class="navbar-header pull-right">
                        <div class="navbar-account">
                            <ul class="account-area">
                                <li>
                                    <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                        <div class="avatar" title="View your public profile">
                                            <img src="{{asset('img/avatars/adam-jansen.jpg')}}">
                                        </div>
                                        <section>
                                            <h2><span class="profile"><span>{{ $adminInfo['userName'] }}[后台管理员]</span></span></h2>
                                        </section>
                                    </a>
                                    <!--Login Area Dropdown-->
                                    <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                        <li class="username"><a>David Stevenson</a></li>
                                        <li class="email"><a>David.Stevenson@live.com</a></li>
                                        <!--Avatar Area-->
                                        <li>
                                            <div class="avatar-area">
                                                <img src="{{asset('img/avatars/adam-jansen.jpg')}}" class="avatar">
                                                <span class="caption">Change Photo</span>
                                            </div>
                                        </li>
                                        <!--Theme Selector Area-->
                                        <li class="theme-area">
                                            <ul class="colorpicker" id="skin-changer">
                                                <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="{{asset('css/skins/blue.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="{{asset('css/skins/azure.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="{{asset('css/skins/teal.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="{{asset('css/skins/green.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="{{asset('css/skins/orange.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="{{asset('css/skins/pink.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="{{asset('css/skins/darkred.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="{{asset('css/skins/purple.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="{{asset('css/skins/darkblue.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="{{asset('css/skins/gray.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="{{asset('css/skins/black.min.css')}}"></a></li>
                                                <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="{{asset('css/skins/deepblue.min.css')}}"></a></li>
                                            </ul>
                                        </li>
                                        <!--/Theme Selector Area-->
                                        <li class="dropdown-footer">
                                            <a href="{{ url('admin/logout') }}">
                                                @lang('index.pageLogout')
                                            </a>
                                        </li>
                                    </ul>
                                    <!--/Login Area Dropdown-->
                                </li>
                                <!-- /Account Area -->
                                <!--Note: notice that setting div must start right after account area list.
                                no space must be between these elements-->
                                <!-- Settings -->
                            </ul>
                            <div class="setting">
                                <a id="logout" title="@lang('index.pageLogout')" href="{{ url('admin/logout') }}">
                                    <i class="icon glyphicon glyphicon-off"></i>
                                </a>
                            </div>
                            <!-- Settings -->
                        </div>
                    </div>
                    <!-- /Account Area and Settings -->
                </div>
            </div>
        </div>
        <!-- /Navbar -->
        <!-- Main Container -->
        <div class="main-container container-fluid">
            <!-- Page Container -->
            <div class="page-container">
                <!-- Page Sidebar -->
                <div class="page-sidebar" id="sidebar">
                    <!-- Sidebar Menu -->
                    <ul class="nav sidebar-menu">
                        <!--UI Elements-->
                        @if ($indexMenus)
                            @foreach ($indexMenus as $pId => $menu)
                             <li @if ($menu->id == $topMenuId) class="open active" @endif>
                                <a href="#" class="menu-dropdown">
                                    <i class="menu-icon fa {{ $menu->icon }}"></i>
                                    <span class="menu-text"> {{$menu->name}} </span>
                                    <i class="menu-expand"></i>
                                </a>
                                <ul class="submenu">
                                    @if ($menu->next )
                                        @foreach ($menu->next as $subId => $subMenu)
                                        <li  @if ($subId == $subMenuId) class="active" @endif>
                                            <a href="{{ route($subMenu->url) }}">
                                                <span class="menu-text">{{ $subMenu->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            @endforeach
                       @endif
                    </ul>
                    <!-- /Sidebar Menu -->
                </div>
                <!-- /Page Sidebar -->
                <!-- Page Content -->
                <div class="page-content">
                    <!-- Page Body -->
                    <div class="page-body">
                        @yield('content')
                    </div>
                    <!-- /Page Body -->
                </div>
                <!-- /Page Content -->
            </div>
            <!-- /Page Container -->
            <!-- Main Container -->

        </div>

        <!--Basic Scripts-->
        <script src="{{asset('js/jquery-2.0.3.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

        <!--Beyond Scripts-->
        <script src="{{asset('js/beyond.min.js')}}"></script>
        <script src="{{asset('js/artDialog/dialog.js')}}"></script>
        @stack('scripts')
    </body>
    <!--  /Body -->
</html>
