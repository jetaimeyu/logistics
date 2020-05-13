<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //
    public function index()
    {

        return view('personal.index', ['user'=>auth()->user(), 'logisticsLine'=>auth()->user()->logisticsLine]);
    }

    public function edit(Request $request)
    {
        auth()->user()->update(['name'=>$request->name]);
        return [];
    }
}
