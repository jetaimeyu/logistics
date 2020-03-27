@extends('layouts.default')
@section('title', '登录')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>登录</h5>
            </div>
            <div class="card-body">
                @include('shared._errors')
                <form  method="post" action="{{route('login')}}">
                    @csrf
                    <div class="form-group has-error has-feedback">
                        <label for="phone">手机号</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone')}}">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{old('password')}}">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>

@endsection
