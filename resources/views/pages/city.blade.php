@extends('layouts.default')
@section('content')
    <ul>
        @foreach($city as $item)
            <li>{{$item->code . '-'. $item->name}}</li>
        @endforeach
    </ul>
    {{$city->onEachSide(2)->links()}}
@endsection
