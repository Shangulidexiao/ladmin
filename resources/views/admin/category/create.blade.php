@extends('admin.layouts.admin')

@push('metas')
<meta name="description" content="Dashboard" />
@endpush

@push('links')
<link id="skin-link" href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts') 
<script src="{{asset('js/validation/bootstrapValidator.js')}}"></script>
<script src="{{asset('js/category/create.js')}}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-palegreen">
                <span class="widget-caption">文章类别添加</span>
            </div>
            <div class="widget-body">
                <div>
                    <form id="defaultForm" role="form" action="{{ url('admin/category/') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-title">类别信息<span></span></div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="pId">父类别</label>
                                    <span class="input-icon icon-right">
                                        <select name="pId" id="pId" class="form-control">
                                            <option value="0">≡作为一级类别≡</option>
                                            @if ($topCategory)
                                                @foreach ($topCategory as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="name">文章啊类别名</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="菜单名">
                                        <i class="fa fa-stack-exchange palegreen"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="orderBy">排序</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="orderBy" name="orderBy" value="{{ old('orderBy') }}" placeholder="排序">
                                        <p class="help-block">*数字越大越靠前</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="isShow">是否显示</label>
                                    <span class="input-icon icon-right">
                                        <select name="isShow" id="isShow">
                                            @foreach ($show as $sk => $sv)
                                            <option value="{{$sk}}">{{$sv}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-blue">添加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection