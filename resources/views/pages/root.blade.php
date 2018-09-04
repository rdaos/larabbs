@extends('layouts.app')

@section('title', '我的主页')

@section('content')

    <div class="row">
        <div class="col-lg-9 col-md-9 topic-list">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>最新话题</span>
                </div>

                <div class="panel-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $new_topics])
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>热门话题</span>
                </div>

                <div class="panel-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $hot_topics])
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('topics._sidebar')
        </div>
    </div>

@endsection