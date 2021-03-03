@extends('layouts.default')
@section('title', ($logisticLine->id?'编辑':'新增').'专线信息')
@section('content')
    <div class="row justify-content-center mt-2">
        <h5>{{$logisticLine->id?'编辑':'新增'}}专线信息</h5>
    </div>
    <div class="row justify-content-center">
        @include('shared._errors')
    </div>
    <div class="container p-0">
        @if($logisticLine->id)
            <form class="needs-validation was-validated" novalidate action="{{route('logistic.update',['logistics_line'=>$logisticLine])}}" method="post">
                @method('put')
                @else
                    <form action="{{route('logistic.store')}}" method="post">
                        @endif
                        @csrf
                        <address-create-and-edit inline-template>
                            <div class="form-group">
                                <select-district inline-template @change="onDistrictChanged"
                                                 :init-value="{{json_encode([old('start_province', $logisticLine->start_province),old('start_city', $logisticLine->start_city),old('start_district', $logisticLine->start_district)])}}">
                                    <div class="form-row align-items-center">
                                        <label class="col-form-label col-sm-2 text-md-right"
                                               style="padding-right: 20px">出发地</label>
                                        <div class="col-sm-3 mb-2 mt-2">
                                            <select class="form-control" v-model="provinceId" required>
                                                <option value="">选择省</option>
                                                <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-sm-3 mb-2 mt-2">
                                            <select class="form-control" v-model="cityId" required>
                                                <option value="">选择市</option>
                                                <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3  mb-2 mt-2">
                                            <select class="form-control" v-model="districtId" required>
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
                        <div class="form-group row">
                            <label for="compName" class="col-sm-2 col-form-label text-md-right">联系人</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="start_contact" name="start_contact"
                                       placeholder="出发地联系人"
                                       value="{{ old('start_contact', $logisticLine->start_contact) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="compName" class="col-sm-2 col-form-label text-md-right">手机号</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="start_phone" name="start_phone"
                                       placeholder="出发地联系人手机号"
                                       value="{{ old('start_phone', $logisticLine->start_phone) }}" required>
                            </div>
                        </div>
                        {{--                <div style="border: 1px dashed #c1c1c1; margin-bottom: 20px"></div>--}}
                        <address-create-and-edit inline-template>
                            <div class="form-group">
                                <select-district inline-template @change="onDistrictChanged"
                                                 :init-value="{{json_encode([old('end_province', $logisticLine->end_province),old('end_city', $logisticLine->end_city),old('end_district', $logisticLine->end_district)])}}">
                                    <div class="form-row align-items-center">
                                        <label class="col-form-label col-sm-2 text-md-right"
                                               style="padding-right: 20px">目的地</label>
                                        <div class="col-sm-3  mb-2 mt-2">
                                            <select class="form-control" v-model="provinceId" required>
                                                <option value="">选择省</option>
                                                <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-sm-3 mb-2 mt-2">
                                            <select class="form-control" v-model="cityId" required>
                                                <option value="">选择市</option>
                                                <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3  mb-2 mt-2">
                                            <select class="form-control" v-model="districtId" required>
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
                        <div class="form-group row">
                            <label for="compName" class="col-sm-2 col-form-label text-md-right">联系人</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="end_contact" name="end_contact"
                                       placeholder="目的地联系人"
                                       value="{{ old('end_contact', $logisticLine->end_contact) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="compName" class="col-sm-2 col-form-label text-md-right">手机号</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="end_phone" name="end_phone"
                                       placeholder="目的地联系人手机号" value="{{ old('end_phone', $logisticLine->end_phone) }}" required>
                            </div>
                        </div>
                        {{--                <div style="border: 1px dashed #c1c1c1; margin-bottom: 20px"></div>--}}
                        <div class="form-group row">
                            <label for="compName" class="col-sm-2 col-form-label text-md-right">描述</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="description" name="description" required
                                   placeholder="请输入描述">{{ old('description', $logisticLine->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center p-2">
                            <button class="btn btn-primary" type="submit">提交</button>
                        </div>
                    </form>

    </div>

@endsection
