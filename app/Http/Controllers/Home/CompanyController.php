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
        return view('company/create', ['company'=>new CompanyInfo()]);
    }

    public function edit(){
        return view('company/create', ['company'=>auth()->user()->company]);
    }

    public function store(companyInfoRequest $request)
    {
        if (! $request->user()->company){
            $request->user()->company()->create($request->only([
                'comp_name',
                'contact',
                'phone' ,
                'tel' ,
                'address' ,
                'detail_address',
                'latitude',
                'longitude',
            ]));
        }
        return redirect()->route('personal.index');
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
