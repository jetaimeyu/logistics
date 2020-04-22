<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //
    public function index()
    {
        return view('personal.index', ['user'=>auth()->user()]);
    }
}
