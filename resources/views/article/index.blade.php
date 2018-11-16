@extends('layouts.admin')

@push('metas')
<meta name="description" content="菜单列表" />
@endpush

@push('links')
<link id="skin-link" href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts') 
<script src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/datatable/datatables-init.js')}}"></script>
<script src="{{asset('js/common/listDelete.js')}}"></script>
<script src="{{asset('js/article/list.js')}}"></script>
@endpush

@section('content')
<div class="row">
    {{ csrf_field() }}
    <input type="hidden" name="delete-url" value="{{ url('admin/article') }}">
    <input type="hidden" name="delete-all-url" value="{{ url('admin/article/deleteAll') }}">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue rep-header-height">
                <span class="widget-caption">文章列表</span>
                <div class="widget-buttons">
                    <a href="#" data-toggle="maximize">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="#" data-toggle="collapse">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a href="#" data-toggle="dispose">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div role="grid" id="searchable_wrapper" class="dataTables_wrapper form-inline">
                    <!--search start-->
                    <div id="searchable_filter" class="dataTables_filter">
                        <div class="row">
                            <div class="col-sm-10 col-lg-11">
                                <form class="form-group">
                                    <label>
                                        <input type="search" class="form-control input-sm" name="search" aria-controls="searchable" placeholder="文章名称" value="{{ $search or '' }}">
                                    </label>  
                                    <button type="submit" class="btn btn-success col-md-push-1 col-lg-push-1 col-xs-push-1 col-sm-push-1" > <i class="fa  fa-search"></i>查询</button>
                                </form>
                                <button class="btn btn-danger pull-right delete-more"> <i class="fa fa-times"></i>批量删除</button>
                            </div>
                            <div  class="col-sm-2 col-lg-1">
                                <a class="btn btn-default purple add-menu" href="{{ url('admin/article/create') }}" title="添加文章"><i class="fa fa-plus"></i>添加</a>
                            </div>
                        </div>
                    </div>
                    <!--search start-->

                    <!--table start-->
                    <table class="table table-striped table-bordered table-hover" id="simpledatatable">
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="colored-danger select-all" data-select="select-one">
                                            <span class="text">全选</span>
                                        </label>
                                    </div>
                                </th>
                                <th>
                                   标题 
                                </th>
                                <th>
									一级类别
                                </th>
                                <th>
                                 	二级类别   
                                </th>
								<th>
									简介
								</th>
                                <th>
                                    显示
                                </th>
                                <th>
                                    添加人
                                </th>
                                <th class="center">
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($list)
                                @foreach ($list as $item)
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="colored-danger select-one" data-select="select-all" value="{{ $item->id }}">
                                                <span class="text">{{ $item->id }}</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        {{ $categorys[$item->topId] }}
                                    </td>
                                    <td>
                                        {{empty($categorys[$item->subId]) ? '-' : $categorys[$item->subId]}}
                                    </td>
                                    <td>
                                        {{ $item->intro }}
                                    </td>
                                    <td class="center ">
                                        {{ $show[$item->isShow] }}
                                    </td>
                                    <td class="center ">
                                        {{ empty($adder[$item->adder]) ? '-' : $adder[$item->adder]}}
                                    </td>
                                    <td class="center ">
                                        <a class="btn btn-success" href="{{ url('admin/article/' . $item->id . '/edit') }}"><i class="fa fa-edit"></i>编辑</a>
                                        <button class="btn btn-danger desgin-delete" data-id="{{ $item->id}}"> <i class="fa fa-times"></i>删除</button>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <!--table start-->
                    <!--pagination start-->
                    @if ($list)
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="simpledatatable_info" role="alert" aria-live="polite" aria-relevant="all">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>当前第{{$list->currentPage()}}页/共{{$list->total()}}页 
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_bootstrap" id="simpledatatable_paginate">
                                {{$list->links()}}
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--pagination end-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
