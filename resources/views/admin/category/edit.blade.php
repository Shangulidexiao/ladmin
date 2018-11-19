@extends('admin.layouts.admin')

@push('metas')
<meta name="description" content="Dashboard" />
@endpush

@push('links')
<link id="skin-link" href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts') 
<script src="{{asset('js/validation/bootstrapValidator.js')}}"></script>
<script src="{{asset('js/category/edit.js')}}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-palegreen">
                <span class="widget-caption">文章类别修改</span>
            </div>
            <div class="widget-body">
                <div>
                    <form id="defaultForm" role="form" action="{{ url('admin/category/' . $category->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-title">文章类别信息<span></span></div>
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
                                    <label for="name">文章类别名</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="文章类别名">
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
                                        <input type="text" class="form-control" id="orderBy" name="orderBy" value="{{ $category->orderBy }}" placeholder="排序">
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
                                        <select name="isShow">
                                            @foreach ($show as $sk => $sv)
                                            <option value="{{$sk}}" @if ($sk == $category->isShow) selected @endif>{{$sv}}</option>
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