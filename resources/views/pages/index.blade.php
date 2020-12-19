@extends('layouts.default')
@section('title', '首页')
@section('keywords','关键词')
@section('description', '描述')
@section('content')
    <div class="row">
            <div class="search-box">
                @include('shared._errors')
                <form action="{{route('search')}}" method="get">
                    @csrf
                    <address-create-and-edit inline-template>
                            <div class="form-group">
                                <select-district inline-template  @change="onDistrictChanged" :init-value="{{json_encode([old('start_province'),old('start_city'),old('start_district')])}}">
                                    <div class="form-row">
                                        <label class="col-form-label col-sm-2 text-md-right" style="padding-right: 20px">出发地</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" v-model="provinceId">
                                                <option value="">选择省</option>
                                                <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control" v-model="cityId">
                                                <option value="">选择市</option>
                                                <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control" v-model="districtId">
                                                <option value="">选择区</option>
                                                <option v-for="(name, id) in districts" :value="id">@{{ name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </select-district>
                                <input type="text" hidden name="start_province" v-model="province">
                                <input type="text" hidden name="start_city" v-model="city">
                                <input type="text" hidden name="start_district" v-model="district">
                            </div>
                    </address-create-and-edit>
                    <address-create-and-edit inline-template>
                        <div class="form-group">
                            <select-district inline-template @change="onDistrictChanged" :init-value="{{json_encode([old('end_province'),old('end_city'),old('end_district')])}}">
                                <div class="form-row">
                                    <label class="col-form-label col-sm-2 text-md-right" style="padding-right: 20px">出发地</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" v-model="provinceId">
                                            <option value="">选择省</option>
                                            <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" v-model="cityId">
                                            <option value="">选择市</option>
                                            <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" v-model="districtId">
                                            <option value="">选择区</option>
                                            <option v-for="(name, id) in districts" :value="id">@{{ name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </select-district>
                            <input type="text" hidden name="end_province" v-model="province">
                            <input type="text" hidden name="end_city" v-model="city">
                            <input type="text" hidden name="end_district" v-model="district">
                        </div>
                    </address-create-and-edit>
                    <button type="submit">提交</button>
                </form>

            </div>
    </div>
@endsection
@section('scriptsAfterJs')
    <script>

    </script>
@endsection
