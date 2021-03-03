@extends('layouts.default')
@section('title', '专线列表')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-1">
            <li class="breadcrumb-item"><a href="/">home</a></li>
            <li class="breadcrumb-item active" aria-current="page">专线列表</li>
            <a href="{{route('logistic.create')}}" class="float-right is-justify-end">添加专线</a>
        </ol>
    </nav>
    <div class="row">
        @foreach($logisticsLines as $logisticsLine)
            <div class="card col-12 m-2">
                <div class="card-body">
                    <div class="row">
                        <div>{{$logisticsLine->start_province.$logisticsLine->startCity.$logisticsLine->startDistrict}}</div>
                        <i class="iconfont icon-qiehuan"></i>
                        <div>{{$logisticsLine->endProvince.$logisticsLine->endCity.$logisticsLine->endDistrict}}</div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 p-0">
                            出发地联系人：{{$logisticsLine->startContact}} {{$logisticsLine->startPhone}}</div>
                        <div class="col-md-6 p-0">
                            目的地联系人：{{$logisticsLine->endContact}}{{$logisticsLine->endPhone}}</div>
                    </div>
                    <div class="row">
                        {{$logisticsLine->description}}
                    </div>
                    <div class="row justify-content-end operate-button">
                        <a href="{{route('logistic.edit',['logistics_line'=>$logisticsLine->id])}}"
                           class="btn btn-primary">修改</a>
                        <a href="#" onclick="deleteLogisticsLine(this)" data-id="{{$logisticsLine->id}}"
                           class="btn btn-primary">删除</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('scriptsAfterJs')
    <script>
        function deleteLogisticsLine(dom) {
            var id = $(dom).data('id');
            swal({
                title: '提示',
                text: "确定删除吗？",
                buttons: ['取消', '确定'],
                icon: 'warning',
            })
                .then(function (res) {
                    if (!!res) {
                        axios.delete('logistic/' + id)
                            .then(function () {
                                window.location.reload();
                            })
                    }
                })
        }
    </script>
@endsection
