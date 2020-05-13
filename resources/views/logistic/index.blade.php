@extends('layouts.default')
@section('title', '专线列表')
@section('content')
    <div class="row">
        {{--        <div class="col-md-10 offset-md-1 ">--}}
        <div class="card panel-default">
            <div class="card-header">
                <h5 class="float-left">专线列表</h5>
                <a href="{{route('logistic.create')}}" class="float-right">添加专线</a>
            </div>
            <div class="card-body">

                <table class="table table-responsive table-bordered table-hover table-sm table-striped">
                    <thead>
                    <tr>
                        <th scope="col">出发地</th>
                        <th>出发地联系人</th>
                        <th>出发地手机号</th>
                        <th>目的地</th>
                        <th>目的地联系人</th>
                        <th>目的地手机号</th>
{{--                        <th>描述</th>--}}
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logisticsLines as $logisticsLine)
                        <tr>
                            <td>{{$logisticsLine->start_province.$logisticsLine->startCity.$logisticsLine->startDistrict}}</td>
                            <td>{{$logisticsLine->startContact}}</td>
                            <td>{{$logisticsLine->startPhone}}</td>
                            <td>{{$logisticsLine->endProvince.$logisticsLine->endCity.$logisticsLine->endDistrict}}</td>
                            <td>{{$logisticsLine->endContact}}</td>
                            <td>{{$logisticsLine->endPhone}}</td>
{{--                            <td>{{$logisticsLine->description}}</td>--}}
                            <td>{{$logisticsLine->status}}</td>
                            <td>
                                @if($logisticsLine->state!=1)
                                    <a href="{{route('logistic.edit',['logistics_line'=>$logisticsLine->id])}}" class="btn btn-primary">修改</a>
                                @endif
                                <button onclick="deleteLogisticsLine(this)" data-id="{{$logisticsLine->id}}"
                                        class="btn btn-danger">删除
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--        </div>--}}
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
