<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}- @yield('title')</title>
    <meta name="Keywords" content="{{config('app.keywords')}}-@yield('keywords')">
    <meta name="Description" content="{{config('app.description')}}-@yield('description')">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="//at.alicdn.com/t/font_2387487_oiqbcaenf3.css">
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
<div  class="container">
    <div id="app" class="{{ route_class() }}-page">
        @include('shared._messages')
        @yield('content')
    </div>
</div>
@include('layouts._footer')
<script src="{{ mix('js/app.js') }}"></script>
@yield('scriptsAfterJs')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    // (function() {
    //     'use strict';
    //     window.addEventListener('load', function() {
    //         // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //         var forms = document.getElementsByClassName('needs-validation');
    //         // Loop over them and prevent submission
    //         var validation = Array.prototype.filter.call(forms, function(form) {
    //
    //             form.addEventListener('submit', function(event) {
    //                 console.log(form);
    //                 if (form.checkValidity() === false) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }
    //                 form.classList.add('was-validated');
    //             }, false);
    //         });
    //     }, false);
    // })();
</script>
</body>
</html>
