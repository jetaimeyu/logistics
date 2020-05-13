<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogisticsLineRequest;
use App\Models\LogisticsLine;
use Illuminate\Http\Request;
use Monolog\Formatter\LogglyFormatter;

class LogisticController extends Controller
{
    public function index(Request $request)
    {
        return view('logistic.index',['logisticsLines'=>$request->user()->logisticsLine ]);
    }
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
        return redirect()->route('logistic.index');
    }

    public function edit(LogisticsLine $logisticsLine)
    {
        $this->authorize('own', $logisticsLine);
        return view('logistic.create', ['logisticLine'=> $logisticsLine]);
      //  return redirect()->route('logistic.index');
    }

    public function destroy(LogisticsLine $logisticsLine)
    {

        $this->authorize('own', $logisticsLine);
        $logisticsLine->delete();
        return [];
    }

    public function update(LogisticsLine $logisticsLine, LogisticsLineRequest $logisticsLineRequest)
    {
        $this->authorize('own', $logisticsLine);
        $logisticsLine->update($logisticsLineRequest->only([
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
        return redirect()->route('logistic.index');
        return redirect()->route('logistic.edit', ['logistics_line'=>$logisticsLine]);

    }
}
