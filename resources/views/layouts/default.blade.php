<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{config('app.name')}}- @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        .BMap_cpyCtrl {
            display: none;
        }
        .anchorBL {
            display: none;
        }
    </style>
</head>
<body>
@include('layouts._header')
<div class="container container-fluid">
    <div class="">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>

</div>

</body>
</html>
