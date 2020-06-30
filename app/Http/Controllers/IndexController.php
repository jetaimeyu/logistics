<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class IndexController extends Controller
{
    //
    public function index(Client $client)
    {
        $response = $client->request('GET', 'http://api50.maidiyun.com/api/v1/Comp/GetCompInfo?compId=26858');
        echo $response->getStatusCode(); // 200
//        echo PHP_EOL;
        echo "</br>";
        echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        echo PHP_EOL;
        echo "\r\n";
        echo $response->getBody(); // '

    }
}
