@extends('layouts.default')
@section('title', '信息编辑')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>信息编辑</h5>
        </div>
        <div class="card-body">
            <form class="" action="">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row" onclick="ll()">
                     <label  for="staticEmail" class="col-sm-2  col-form-label">Email</label>
{{--                        <input type="text">--}}
                         <p class="form-control-plaintext">email@example.com</p>
                    </div>
                     
                </div>
            </form>
        </div>
    </div>
    <script>
        function ll(){
            $('#exampleModal').modal({})
        }

    </script>
    {{--    </div>--}}
@endsection
