<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Collapsed content</h5>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
{{--            <ul class="nav nav-pills " id="nav-tabs">--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link active" href="#">嘿嘿</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">哈哈哈</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Link</a>--}}
{{--                </li>--}}
{{--            </ul>--}}

        @if(Auth::check())
            <div class="dropdown justify-content-end">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{auth()->user()->name}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('personal.index')}}">个人中心</a>
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
    </nav>
</div>
<script>
    $('#nav-tabs a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })


    // var str = "";
    // Array.from($("tbody").children).map((tr, index)=>{
    //     if(index>2 && index<3216){
    //         console.log(tr.children[1].innerText.trim(), tr.children[2].innerText.trim())
    //         if(tr.children[1]){
    //             str = str + "['code'=>'" + tr.children[1].innerText.trim() +"','name'=>'"+tr.children[2].innerText.trim()+"'],"
    //         }
    //     }
    // })
    // console.log(str.substring(0,str.length-1))
</script>
