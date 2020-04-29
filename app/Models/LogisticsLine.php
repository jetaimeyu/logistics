<?php

namespace App\Models;


class LogisticsLine extends BaseModel
{
    //
    protected  $fillable=[
        'user_id',
        'start_province',
        'start_city',
        'start_district',
        'start_contact',
        'start_phone',
        'end_province',
        'end_city',
        'end_district',
        'end_contact',
        'end_phone',
        'description',
        'state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

}
