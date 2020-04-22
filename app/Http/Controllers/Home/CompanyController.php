<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\companyInfoRequest;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function create()
    {
        return view('company/create');
    }

    public function edit(){
        return view('company/create', ['user'=>auth()->user()]);
    }

    public function store(companyInfoRequest $request)
    {
//        CompanyInfo::created([
//
//        ]);
//        'compName' => 'required',
//            'contact' => 'required',
//            'phone' => 'required',
//            'tel' => 'required',
//            'address' => 'required',
//            'detail_address' => 'required',
//            'latitude' => 'required',
//            'longitude' => 'required',
    }

    public function update(CompanyInfo $companyInfo, companyInfoRequest $request)
    {
        $companyInfo->update($request->only([
             'comp_name',
            'contact',
            'phone' ,
            'tel' ,
            'address' ,
            'detail_address',
            'latitude',
            'longitude',
        ]));
        return redirect()->route('personal.index');
    }
}
