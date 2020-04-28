<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogisticsLineRequest;
use App\Models\LogisticsLine;
use Illuminate\Http\Request;

class LogisticController extends Controller
{
    //
    public function create()
    {
        return view('logistic.create', ['logisticLine'=> new LogisticsLine()]);
    }

    public function store(LogisticsLineRequest $request)
    {
        dd($request);

    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
