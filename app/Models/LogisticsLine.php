<?php

namespace App\Models;


class LogisticsLine extends BaseModel
{
    //
    protected  $fillable=[
        'user_id',
        'start_address',
        'start_contact',
        'start_phone',
        'end_address',
        'end_contact',
        'end_phone',
        'state'
    ];

}
