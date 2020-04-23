<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{config('app.name')}}- @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1775039_l3jn6n5kl7l.css">:
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        .BMap_cpyCtrl {
            display: none;
        }
        .anchorBL {
            display: none;
        }
        .modal-open {
        　　overflow: auto !important;
        }
    </style>
</head>
<body>
@include('layouts._header')
<div class="container container-fluid">
    <div class="{{ route_class() }}-page">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>

</div>
@yield('scriptsAfterJs')
</body>
</html>
