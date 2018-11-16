@extends('admin.layouts.admin')

@push('metas')
<meta name="description" content="Dashboard" />
@endpush

@push('links')
<link id="skin-link" href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts') 
<script src="{{asset('js/ueditor/ueditor.config.js')}}"></script>
<script src="{{asset('js/ueditor/ueditor.all.js')}}"></script>
<script src="{{asset('js/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script src="{{asset('js/linkage.js')}}"></script>
<script src="{{asset('js/article/edit.js')}}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-palegreen">
                <span class="widget-caption">文章修改</span>
            </div>
            <div class="widget-body">
                <div>
                    <form id="defaultForm" role="form" action="{{ url('admin/article/' . $article->id ) }}" method="POST">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}
                        <div class="form-title">类别信息<span></span></div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="topId">所属一级类别</label>
                                    <span class="input-icon icon-right">
                                        <select name="topId" id="topId" class="form-control">
                                            <option value="0">请选择</option>
                                            @if ($topCategory)
                                                @foreach ($topCategory as $topId => $topName)
                                                    <option value="{{$topId}}" @if($topId == $article->topId) selected @endif>{{$topName}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="help-block">*请选择文章的类别</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="subId">所属二级类别</label>
                                    <span class="input-icon icon-right">
                                        <select name="subId" id="subId" class="form-control">
                                            <option value="0">请选择二级类别</option>
                                            @if ($subCategory)
                                                @foreach ($subCategory as $subId => $subName)
                                                    <option value="{{$subId}}">{{$subName}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <input type="hidden" name="selSubId" value="{{ $article->subId }}">
                                        <p class="help-block">*请选择文章的类别</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-title">文章信息<span></span></div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="title">文章名</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" placeholder="文章名">
                                        <i class="fa fa-stack-exchange palegreen"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="sub-title">副标题</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="sub-title" name="subTitle" value="{{ $article->subTitle }}" placeholder="文章副标题">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label for="article-content">文章内容</label>
                                    <script id="article-content" name="content" type="text/plain">{!! $article->content !!}</script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="keywords">关键字</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="keywords" name="keywords" value="{{ $article->keywords }}" placeholder="文章关键字">
                                        <p class="help-block">*关键字用，分割</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="intro">简介</label>
                                    <span class="input-icon icon-right">
										<textarea id="intro" name="intro" class="form-control" cols="30" rows="5" placeholder="简介">{{$article->intro}}</textarea>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="orderBy">排序</label>
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control" id="orderBy" name="orderBy" value="{{ $article->orderBy }}" placeholder="排序">
                                        <p class="help-block">*数字越大越靠前</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label for="is-show">是否显示</label>
                                    <span class="input-icon icon-right">
                                        <select name="isShow" id="is-show">
                                            @foreach ($show as $sk => $sv)
												<option value="{{$sk}}" @if ($sk == $article->isShow) selected @endif>{{$sv}}</option>
											@endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-blue article-edit">修改</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
