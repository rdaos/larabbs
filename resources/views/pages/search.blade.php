@extends('layouts.app')

@section('title', '我的主页')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 topic-list">
            <div class="panel panel-default list-panel search-results">

                <div class="panel-heading">
                    <h3 class="panel-title ">
                        <i class="fa fa-search"></i> 关于 “<span class="highlight">{{ $q }}</span>” 的搜索结果, 共
                        {{ $topics->total() }} 条

                        <div class="pull-right" style="margin-top: -10px;margin-right: 0px;">
                            <a class="btn btn-default btn-sm {{ if_query('order', 'recent') ? 'disabled' : '' }}"
                               href="{{ Request::url() }}?q={{ $q }}&&order=recent"><i class="fa fa-thumbs-up"></i> 最新发布</a>
                            <a class="btn btn-default btn-sm {{ if_query('order', 'default') ? 'disabled' : '' }}"
                               href="{{ Request::url() }}?q={{ $q }}&&order=default"><i class="fa fa-random"></i> 最后回复</a>
                        </div>
                    </h3>
                </div>

                <div class="panel-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $topics])
                    {{-- 分页 --}}
                    {!! $topics->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>

@endsection