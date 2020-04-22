<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompanyInfo extends Model
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
        'ss'=>'222'
    ];
    public function getAttribute($key)
    {
        $key = Str::snake($key);
        return parent::getAttribute($key);
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
