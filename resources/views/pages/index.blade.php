@extends('layouts.default')
@section('title', '首页')
@section('keywords','关键词')
@section('description', '描述')
@section('content')
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide rol m-3" data-ride="carousel" style="width: 100%">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/www.jpg" class="d-block w-100" style="height: 100px;object-fit: fill" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/www.jpg" class="d-block w-100" style="height: 100px;object-fit: fill" alt="...">
                </div>
                <div class="carousel-item">
                    <img onclick="alert(1)" src="/images/www.jpg" class="d-block w-100"
                         style="height: 100px;object-fit: fill" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row justify-content-center p-3">
        @include('shared._search')
{{--        @include('logistic.logisticSearch')--}}
    </div>
@endsection
@section('scriptsAfterJs')
    <script>
        // $(function (){
        var ss = {a: 1, b: 2};
        let aa = _.cloneDeep(ss);
        console.log(ss === aa)
        // })

    </script>
@endsection
