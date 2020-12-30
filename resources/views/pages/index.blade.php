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
    {{--<div class="row text-center">--}}
    {{--<div class="col">--}}
    {{--<img src="/images/www.jpg" class="m-3" style="height: 50px;" alt="">--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="row justify-content-center p-3">
        @include('logistic.logisticSearch')

        {{--<form action="{{route('search')}}" method="get" class="form-row align-items-center">--}}
            {{--@csrf--}}
            {{--<div class="form-group select-text">--}}
                {{--<address-create-and-edit inline-template>--}}
                    {{--<div class="form-group ">--}}
                        {{--<select-district inline-template @change="onDistrictChanged"--}}
                                         {{--:init-value="{{json_encode([old('start_province'),old('start_city'),old('start_district')])}}">--}}
                            {{--<div class="form-row">--}}
                                {{--<label class="col-form-label col-sm-2 text-md-right"--}}
                                       {{--style="padding-right: 20px">初始地</label>--}}
                                {{--<div class="col-sm-3 input-group-sm">--}}
                                    {{--<select class="form-control   @error('start_province') is-invalid @enderror" v-model="provinceId" required>--}}
                                        {{--<option value="">选择省</option>--}}
                                        {{--<option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>--}}
                                    {{--</select>--}}
                                    {{--@error('start_province')--}}
                                    {{--<div class="invalid-feedback">{{ $message }}</div>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3 input-group-sm">--}}
                                    {{--<select class="form-control  @error('start_city') is-invalid @enderror" v-model="cityId" required>--}}
                                        {{--<option value="">选择市</option>--}}
                                        {{--<option v-for="(name, id) in cities" :value="id">@{{ name }}</option>--}}
                                    {{--</select>--}}
                                    {{--@error('start_city')--}}
                                    {{--<div class="invalid-feedback">{{ $message }}</div>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3 input-group-sm">--}}
                                    {{--<select class="form-control  @error('start_district') is-invalid @enderror" v-model="districtId" required>--}}
                                        {{--<option value="">选择区</option>--}}
                                        {{--<option v-for="(name, id) in districts" :value="id">@{{ name }}</option>--}}
                                    {{--</select>--}}
                                    {{--@error('start_district')--}}
                                    {{--<div class="invalid-feedback">{{ $message }}</div>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</select-district>--}}
                        {{--<input type="text" hidden name="start_province" v-model="province">--}}
                        {{--<input type="text" hidden name="start_city" v-model="city">--}}
                        {{--<input type="text" hidden name="start_district" v-model="district">--}}
                    {{--</div>--}}
                {{--</address-create-and-edit>--}}
                {{--<address-create-and-edit inline-template>--}}
                    {{--<div class="form-group">--}}
                        {{--<select-district inline-template @change="onDistrictChanged"--}}
                                         {{--:init-value="{{json_encode([old('end_province'),old('end_city'),old('end_district')])}}">--}}
                            {{--<div class="form-row input-group-sm">--}}
                                {{--<label class="col-form-label col-sm-2 text-md-right"--}}
                                       {{--style="padding-right: 20px">目的地</label>--}}
                                {{--<div class="col-sm-3 input-group-sm">--}}
                                    {{--<select class="form-control  @error('end_province') is-invalid @enderror" v-model="provinceId" required>--}}
                                        {{--<option value="">选择省</option>--}}
                                        {{--<option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>--}}
                                    {{--</select>--}}
                                    {{--@error('end_province')--}}
                                    {{--<div class="invalid-feedback">{{ $message }}</div>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3 input-group-sm">--}}
                                    {{--<select class="form-control  @error('end_city') is-invalid @enderror" v-model="cityId" required>--}}
                                        {{--<option value="">选择市</option>--}}
                                        {{--<option v-for="(name, id) in cities" :value="id">@{{ name }}</option>--}}
                                    {{--</select>--}}
                                    {{--@error('end_city')--}}
                                    {{--<div class="invalid-feedback">{{ $message }}</div>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3 input-group-sm">--}}
                                    {{--<select class="form-control  @error('end_district') is-invalid @enderror" v-model="districtId" >--}}
                                        {{--<option value="">选择区</option>--}}
                                        {{--<option v-for="(name, id) in districts" :value="id">@{{ name }}</option>--}}
                                    {{--</select>--}}
                                    {{--@error('end_district')--}}
                                        {{--<div class="invalid-feedback">{{ $message }}</div>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</select-district>--}}
                        {{--<input type="text" hidden name="end_province" v-model="province">--}}
                        {{--<input type="text" hidden name="end_city" v-model="city">--}}
                        {{--<input type="text" hidden name="end_district" v-model="district">--}}
                    {{--</div>--}}
                {{--</address-create-and-edit>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<button type="submit" class="btn-primary btn  btn-sm">搜索</button>--}}
            {{--</div>--}}
        {{--</form>--}}

    </div>
@endsection
@section('scriptsAfterJs')
    <script>

    </script>
@endsection
