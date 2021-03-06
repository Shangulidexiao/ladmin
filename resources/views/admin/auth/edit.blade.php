@extends('admin.layouts.admin')

@push('metas')
<meta name="description" content="Dashboard" />
@endpush

@push('links')
<link id="skin-link" href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts') 
<script src="{{asset('js/validation/bootstrapValidator.js')}}"></script>
<script src="{{asset('js/auth/edit.js')}}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-palegreen">
                <span class="widget-caption">菜单修改</span>
            </div>
            <div class="widget-body">
                <div>
                    <form id="defaultForm" role="form" action="{{ url('admin/auth/' . $menu->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-title">菜单信息<span></span></div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="pId">父菜单</label>
                                    <span class="input-icon icon-right">
                                        <select name="pId" class="form-control">
                                            <option value="0">≡作为一级菜单≡</option>
                                            {!!$treeStr!!}
                                        </select>
                                        <p class="help-block">*添加子菜单请在列表页勾选父菜单</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="name">菜单名</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" placeholder="菜单名">
                                        <i class="fa fa-stack-exchange palegreen"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="icon">菜单图标</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="icon" name="icon" value="{{ $menu->icon }}" placeholder="菜单图标">
                                        <i class="{{ $menu->icon }}"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="orderBy">排序</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="orderBy" name="orderBy" value="{{ $menu->orderBy }}" placeholder="排序">
                                        <p class="help-block">*数字越大越靠前</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="url">url</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="url" name="url" value="{{ $menu->url }}" placeholder="链接">
                                        <p class="help-block">*填写命名路由的名字</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="isShow">是否显示</label>
                                    <span class="input-icon icon-right">
                                        <select name="isShow">
                                            @foreach ($show as $sk => $sv)
                                            <option value="{{$sk}}" @if ($sk == $menu->isShow) selected @endif>{{$sv}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-blue">修改</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection