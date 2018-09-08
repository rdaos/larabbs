@extends('layouts.app')

@section('title', '我的主页')

@section('content')

    <div class="row">
        <div class="col-lg-9 col-md-9 topic-list">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span><i class="glyphicon glyphicon-fire mr5"></i>热门话题</span>
                    <a href="{{ route('topics.index') }}?order=view" class="meta pull-right">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                    </a>
                </div>

                <div class="panel-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $hots])
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span><i class="glyphicon glyphicon-leaf mr5"></i>最新话题</span>
                    <a href="{{ route('topics.index') }}?order=default" class="meta pull-right">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                    </a>
                </div>

                <div class="panel-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $news])
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('pages._sidebar')
        </div>
    </div>

@endsection