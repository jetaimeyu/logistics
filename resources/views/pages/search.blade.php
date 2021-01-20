@extends('layouts.default')
@section('content')
    <div class="row">
        @include('shared._search')
    </div>
    <div class="row">{{$logistics->count().'/'.$logistics->total()}}
{{--        {{$logistics->first()->startAddress}}--}}
{{--        <p> {{json_encode($logistics->first(),JSON_UNESCAPED_UNICODE )}}</p>--}}
    </div>
    <div class="row p-2 flex-column">
        @foreach($logistics as $logistic)
            <div class="card mb-2 col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$logistic->user->company->comp_name.$logistic->id}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$logistic->description}}</h6>
                    <p class="card-text">
                        {{$logistic->startAddress}}
                        <i class="iconfont iconzhuanhuan text-primary"></i>
                        {{$logistic->startAddress}}</p>
                    {{--                    <p class="card-text">22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e22e2e2e2e</p>--}}
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        @endforeach

    </div>
{{--    <div class="row d-md-flex">--}}
{{--        {!! $logistics->onEachSide(2)->withQueryString()->links() !!}--}}
{{--    </div>--}}
@endsection
@section('scriptsAfterJs')
    <script>
    </script>
@endsection
