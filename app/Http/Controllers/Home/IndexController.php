<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\SearchRequest;
use App\Models\City;
use App\Models\LogisticsLine;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\VarDumper\Cloner\Data;

class IndexController extends Controller
{
    //
    public function index()
    {
//        $count=DB::table('soul')->count()-1;
//        $skip = mt_rand(0, $count);
//        $d = DB::table('soul')->select('title')->skip($skip)->take(1)->first();
//        dd($d->title);
        $user = User::find(4);
       return view('pages/index', ['user'=> $user]);
    }


    public function search(SearchRequest $request)
    {
        dd('嘿嘿嘿');
//        $logistics = LogisticsLine::checked()
//            ->where('start_province', $request->start_province)
//            ->where('start_city', $request->start_city)
//            ->where('start_district', $request->start_district)
//            ->where('end_province', $request->end_province)
//            ->where('end_city', $request->end_city)
//            ->where('end_district', $request->end_district)
//            ->select('user_id')
//            ->get();
        $logistic = LogisticsLine::checked()->select('user_id')->addSelect('end_city')->take(1)->get();
//        echo  $logistics->count();
//        var_dump($logistics->toArray());
//        var_dump($logistic->first()->end_city);
//        dd($logistic);
//        dd($logistic->toArray());
//        return view('pages/search',['logistics'=>$logistics,'request'=>$request->start_province]);
        return view('pages/search', ['end_city' => $logistic->first()->end_city, 'logistic' => $logistic->toArray()]);
    }


    public function xx()
    {

        return view('pages.xx');
    }
}
