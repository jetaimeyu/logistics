@extends('layouts.default')
@section('title', '新增')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>新增</h5>
        </div>
        <div class="card-body">
            <form action="{{route('logistic.store')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label">出发地</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="start_address" name="start_address" value="{{ old('start_address', $logisticLine->start_address) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label">联系人</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="start_contact" name="start_contact" value="{{ old('start_contact', $logisticLine->start_contact) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label">手机号</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="start_phone" name="start_phone" value="{{ old('start_phone', $logisticLine->start_phone) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label">联系人</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="end_contact" name="end_contact" value="{{ old('end_contact', $logisticLine->end_contact) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compName" class="col-sm-2 col-form-label">手机号</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="end_phone" name="end_phone" value="{{ old('end_phone', $logisticLine->end_phone) }}">
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
