<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RandController extends Controller
{
    //
    public function index()
    {
        $count=DB::table('soul')->count()-1;
        $skip = mt_rand(0, $count);
        $d = DB::table('soul')->select('title')->skip($skip)->take(1)->first();
        return response()->json(['title'=>$d->title]);
    }
}
