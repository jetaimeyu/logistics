@extends('layouts.default')
@section('title', '登录')
@section('content')
    <div class="offset-md-2 col-md-8">

        <div class="card">
            <div class="card-header">
                <h5 class="h3 mb-3  font-weight-normal">登录</h5>
            </div>
            <div class="card-body">
                @include('shared._errors')
{{json_encode($errors)}}

                <form method="post" id="login-form" action="{{route('login')}}">
                    @csrf
                    <div class="form-group has-error has-feedback">
                        <label for="phone">手机号</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               id="phone" value="{{old('phone')}}" required>
                        <div class="invalid-feedback">
                            请输入手机号
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">密码 （<a href="{{ route('password.reset') }}">忘记密码</a>）：</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror" id="password"
                               value="{{old('password')}}" required>
                        <div class="invalid-feedback">
                            请输入密码
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">记住我</label>
                    </div>
                    <button type="submit" class="btn btn-primary">登录</button>
                </form>
            </div>

        </div>
    </div>

@endsection
@section('scriptsAfterJs')
    <script>    
      $(function () {
          var forms =  $("#login-form");
          var validation = Array.prototype.filter.call(forms, function (form) {
              form.addEventListener('submit', function (event) {
                  if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                  }
                  form.classList.add('was-validated');
              }, false);
          });
      })

    </script>
@endsection
