@extends('layouts.default')
@section('title', '重置密码')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>重置密码</h5>
            </div>
            <div class="card-body">
                @include('shared._errors')
                {{--验证码错误信息begin--}}
                <div class="alert alert-danger fade show" style="display: none;" id="yc">
                    <button type="button" class="close" aria-label="Close" onclick="$('#yc').hide()" ;>
                        <span aria-hidden="true">×</span></button>
                    <ul class="margin-bottom-none padding-left-lg" id="li1">
                    </ul>
                </div>
                {{--验证码错误信息end--}}
                <form action="{{route('password.resetPassword')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="phone">手机号</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your phone with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="captcha">图片验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" style="height: 40px;" class="form-control" id="captcha" name="captcha" value="{{old('captcha')}}">
                            <a href="#" onclick="updateImg()" style="margin-left: 10px;">
                                <img src="{{url('captcha/1')}}" id="captchaImg"/></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="verificationCode">手机验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" style="height: 40px;" class="form-control" id="verificationCode" name="verificationCode" value="{{old('verificationCode')}}">
                            <button style="margin-left: 10px;" type="button" id="getCodeButton" onclick="getVerificationCode(this)">
                                获取验证码
                            </button>
                            {{--                            <a href="#" onclick="updateImg()" style="margin-left: 10px;"> <img src="{{url('captcha/1')}}" id="captchaImg" /></a>--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">重复密码</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var timeCount = 60;

        function setTime(obj) {
            if (timeCount === 0) {
                obj.attr('disabled', false);
                obj.text('获取验证码');
                timeCount = 60;
                return;
            } else {
                obj.attr('disabled', true);
                obj.text(`(${timeCount}s)后重新获取`);
                timeCount--;
            }
            setTimeout(function () {
                setTime(obj);
            }, 1000);
        }

        function updateImg() {
            var url = "{{url('captcha')}}";
            url += ("/" + Math.random());
            $("#captchaImg").attr('src', url);
        }

        function getVerificationCode(obj) {
            var phone = $("#phone").val()
            var captcha = $("#captcha").val()
            var url = "{{route('getVerificationCode')}}";
            $.ajax({
                type: "get",
                url: url,
                data: {
                    phone: phone,
                    captcha: captcha
                },
                dataType: "JSON",
                success: function (result) {
                    console.log(result)
                    if (result.status == 1) {
                        setTime($("#getCodeButton"))
                    } else {
                        $('.alert').alert()
                        $('#yc').css('display', 'block');
                        $('#li1').html(result.message);
                    }
                }
            })

        }

    </script>
@endsection
