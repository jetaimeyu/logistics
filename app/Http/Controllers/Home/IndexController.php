<?php

namespace App\Http\Controllers\Home;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $user = User::find(4);
       return view('pages/index', ['user'=> $user]);
    }
}
