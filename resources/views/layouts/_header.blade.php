<div class="pos-f-t">
    <nav class="navbar sticky-top navbar-light navbar-expand-md" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">LOGISTICS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            @if(Auth::check())
                <div class="dropdown justify-content-end d-flex">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                    </button>
                    <div class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('personal.index')}}">个人中心</a>
                        <a class="dropdown-item" href="{{route('logistic.index')}}">我的专线</a>
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                        </form>
                    </div>
                </div>
            @else
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('login')}}">登录</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.create')}}">注册</a>
                    </li>
                </ul>
            @endif
        </div>
        {{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--            <span class="navbar-toggler-icon"></span>--}}
        {{--        </button>--}}

    </nav>
</div>
@section('scriptAfterJS')
    <script>
        $('#nav-tabs a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
@endsection
