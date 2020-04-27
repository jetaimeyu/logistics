<?php

namespace App\Models;


class CompanyInfo extends BaseModel
{
    protected  $fillable=[
        'comp_name',
        'contact',
        'phone' ,
        'tel' ,
        'address',
        'detail_address' ,
        'latitude' ,
        'longitude' ,
    ];
    //
    protected $attributes=[
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
