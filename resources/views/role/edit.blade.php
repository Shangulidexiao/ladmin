@extends('layouts.admin')

@push('metas')
<meta name="description" content="Dashboard" />
@endpush

@push('links')
<link id="skin-link" href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link id="skin-link" href="{{asset('css/zTreeStyle/zTreeStyle.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts') 
<script src="{{asset('js/validation/bootstrapValidator.js')}}"></script>
<script src="{{asset('js/ztree/jquery.ztree.core.min.js')}}"></script>
<script src="{{asset('js/ztree/jquery.ztree.excheck.js')}}"></script>
<script>
var zNodes = {!! $zTree !!};
</script>
<script src="{{asset('js/role/edit.js')}}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-palegreen">
                <span class="widget-caption">角色修改</span>
            </div>
            <div class="widget-body">
                <div>
                    <form id="defaultForm" role="form" action="{{ url('role/' . $role->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-title">角色信息<span></span></div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="name">角色名</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" placeholder="角色名">
                                        <i class="fa fa-building-o palegreen"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="orderBy">排序</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="orderBy" name="orderBy" value="{{ $role->orderBy }}" placeholder="排序">
                                        <i class="fa  fa-unsorted palegreen"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-title">权限信息</div>
                        <div class="row">
                            <ul id="authTree" class="ztree"></ul>
                            <input type="hidden" name="authIds" value="">
                        </div>
                        <button type="submit" class="btn btn-blue">修改</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection