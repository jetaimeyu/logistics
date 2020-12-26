<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\SearchRequest;
use App\Models\City;
use App\Models\LogisticsLine;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class IndexController extends Controller
{
    //
    public function index()
    {
        $user = User::find(4);
       return view('pages/index', ['user'=> $user]);
    }


    public function search(SearchRequest $request)
    {
        $logistics = LogisticsLine::checked()
            ->where('start_province', $request->start_province)
            ->where('start_city', $request->start_city)
            ->where('start_district', $request->start_district)
            ->where('end_province', $request->end_province)
            ->where('end_city', $request->end_city)
            ->where('end_district', $request->end_district)
            ->get();
        dd($logistics);
        return view('pages/search',['logistics'=>$logistics,'request'=>$request->start_province]);

    }
}
