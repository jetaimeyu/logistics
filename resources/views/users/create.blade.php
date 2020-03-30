@extends('layouts.default')
@section('title','注册')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>注册</h5>
            </div>
            <div class="card-body">
                <form action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="phone">手机号</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="captcha">图片验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" style="height: 40px;" class="form-control" id="captcha" name="captcha">
                            <a href="#" onclick="updateImg()" style="margin-left: 10px;"> <img src="{{url('captcha/1')}}" id="captchaImg" /></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="verificationCode">手机验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" style="height: 40px;" class="form-control" id="verificationCode" name="verificationCode">
                            <button type="button" onclick="getVerificationCode()">获取验证码</button>
{{--                            <a href="#" onclick="updateImg()" style="margin-left: 10px;"> <img src="{{url('captcha/1')}}" id="captchaImg" /></a>--}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function updateImg() {
            var url ="{{url('captcha')}}";
            url+=("/"+Math.random());
            console.log(url);
            $("#captchaImg").attr('src', url);
        }
        function getVerificationCode() {
            var phone = $("#phone").val()
            var captcha =$("#captcha").val()
            var url ="{{route('getVerificationCode')}}";
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
                    if (result.status==1){

                    }else{
                        alert(result.message)
                        return;
                    }
                }
            })

        }

    </script>
@endsection
