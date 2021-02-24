<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ImageUploadRequest;
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
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Cloner\Data;

class IndexController extends Controller
{
    //
    public function index()
    {
       return view('pages/index');
    }
    public function search(SearchRequest $request)
    {
        $logistics = LogisticsLine::checked()
            ->where(function ($query) use ($request) {
            $query->where('start_province', $request->start_province);
            $query->where('end_province', $request->end_province);
            if ($request->start_city) $query->where('start_city', $request->start_city);
            if ($request->start_district) $query->where('start_district', $request->start_district);
            if ($request->end_city) $query->where('end_city', $request->end_city);
            if ($request->end_district) $query->where('end_district', $request->end_district);
        })
            ->with('user.company')->paginate(3);
        return view('pages/search', ['logistics' => $logistics, 'filters'=>$request]);
    }

    public function xx()
    {
        return view('pages.xx');
    }

    public function upload(ImageUploadRequest $request)
    {
        if ($request->file('file')->isValid()){
            $path = 'timage/'.date('Ymd',time());
            $url = upload_image($path, $request->file('file'), 'public');
            return response()->json(['status'=>1, 'data'=>$url]);
        }

    }
}
