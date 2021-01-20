@extends('layouts.default')
@section('title', '文件上传')
@section('content')
    @include('shared._errors')
    <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file"></label>
            <input type="file" name="file" id="file" value="{{old('file')}}" onchange="uploadImage()">
        </div>
        <button class="btn-primary btn" type="submit">submit</button>
    </form>
@endsection
@section('scriptsAfterJs')
    <script>
        var uploadImage=()=>{
            let formData = new FormData();
            var file = document.querySelector('#file');
            formData.append("file", file.files[0]);
            axios.post('{{route('upload')}}', formData, {
                headers:{
                    "Content-Type":"multipart/form-data"
                }
            }).then((result)=>{
                console.log(result)
            })
        };
        $(function (){
           console.log(2)
        })
    </script>
@endsection
