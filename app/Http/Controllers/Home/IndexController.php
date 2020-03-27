<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
       return view('pages/index');
    }
}
