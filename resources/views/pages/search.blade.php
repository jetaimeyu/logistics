@extends('layouts.default')
@section('title', '搜索结果')
@section('content')
    <div class="row">
        嘿嘿嘿
        {{json_encode($request)}}
        @foreach($logistics as $logistic )
         <div>{{json_encode($logistic->end_phone)}}</div>
        @endforeach
    </div>
@endsection
@section('scriptsAfterJs')
    <script>

    </script>
@endsection
