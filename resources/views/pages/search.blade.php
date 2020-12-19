@extends('layouts.default')
@section('title', '搜索结果')
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($logistics as $logistic )
                        <li class="list-group-item">
                            <div>{{$logistic->start_province.$logistic->start_city.$logistic->start_district}}</div>
                            <div>{{$logistic->start_province.$logistic->start_city.$logistic->start_district}}</div>
                            <div>{{$logistic->start_contact}}</div>
                            <div>{{$logistic->end_phone}}</div>

                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('scriptsAfterJs')
    <script>

    </script>
@endsection
