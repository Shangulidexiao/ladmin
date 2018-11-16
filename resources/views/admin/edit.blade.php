@extends('layouts.admin')

@push('metas')
<meta name="description" content="Dashboard" />
@endpush

@push('links')
<link id="skin-link" href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts') 
<script src="{{asset('js/validation/bootstrapValidator.js')}}"></script>
<script src="{{asset('js/admin/edit.js')}}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-palegreen">
                <span class="widget-caption">人员修改</span>
            </div>
            <div class="widget-body">
                <div>
                    <form id="defaultForm" role="form" action="{{ url('admin/admin/' . $admin->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-title">人员信息<span></span></div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userName">用户名</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="userName" disabled="disabled" name="userName" value="{{ $admin->userName }}" placeholder="用户名">
                                        <i class="fa fa-user palegreen"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="trueName">姓名</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="trueName" name="trueName" value="{{ $admin->trueName }}" placeholder="姓名">
                                        <i class="fa fa-user circular"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="password">密码</label>
                                    <span class="input-icon icon-right">
                                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="密码">
                                        <i class="fa fa-lock circular"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="repassword">确认密码</label>
                                    <span class="input-icon icon-right">
                                        <input type="password" class="form-control" id="password" name="repassword" value="" placeholder="确认密码">
                                        <i class="fa fa-lock circular"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="mobile">手机号</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $admin->mobile }}" placeholder="手机号">
                                        <i class="glyphicon glyphicon-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>邮箱</label>
                                    <span class="input-icon icon-right">
                                        <input type="email" class="form-control" name="email" value="{{ $admin->email }}" placeholder="邮箱">
                                        <i class="fa fa-envelope-o circular"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-title">角色信息</div>
                        <div class="row">
                            @if ($roleName)
                            @foreach ( $roleName as $roleId => $roleName )
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roleId[]" value="{{$roleId}}" 
                                               @if(in_array($roleId, $roleIds)) 
                                               checked 
                                               @endif
                                               />
                                        <span class="text">{{$roleName}}</span>
                                    </label>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <button type="submit" class="btn btn-blue">修改</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection