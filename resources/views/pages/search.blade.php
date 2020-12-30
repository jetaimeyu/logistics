@extends('layouts.default')
@section('title', '搜索结果')
@section('content')
    <div class="row">
        @for($i=0;$i<10;$i++)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
            @endfor
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">{{json_encode($logistic,JSON_UNESCAPED_UNICODE)}}
                        {{$end_city}}
                    </ul>
                </div>
            </div>
        </div>
        {{--<div class="col-md-4" style="background: aquamarine">2222</div>--}}

    </div>
@endsection
@section('scriptsAfterJs')
    <script>
        $(()=>{
            $("#wewe").click(()=>{
                console.log(window)
                axios.get("www")
            })
        })
    </script>
@endsection
