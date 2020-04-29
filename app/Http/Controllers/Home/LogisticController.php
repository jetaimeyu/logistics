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
        $request->user()->logisticsLine()->create($request->only([
            'start_province',
            'start_city',
            'start_district',
            'start_contact',
            'start_phone',
            'end_province',
            'end_city',
            'end_district',
            'end_contact',
            'end_phone',
            'description',
        ]));
        return redirect()->route('personal.index');
    }

    public function edit(LogisticsLine $logisticsLine)
    {
        $this->authorize('own', $logisticsLine);
    }

    public function destroy(LogisticsLine $logisticsLine)
    {
        $this->authorize('own', $logisticsLine);
        $logisticsLine->delete();
        return [];
    }
}
