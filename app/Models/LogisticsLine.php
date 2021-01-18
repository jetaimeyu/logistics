<?php

namespace App\Models;


class LogisticsLine extends BaseModel
{
    //
    protected $fillable = [
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
    private $status = [
        '0' => '未审核',
        '1' => '已审核',
        '2' => '审核失败'
    ];

    public function scopeChecked($query)
    {
        return $query->where('state', 1);
    }

    public function getStatusAttribute()
    {
        return $this->status[$this->state];

    }

    public function getStartAddressAttribute()
    {
        return $this->start_province.$this->start_city.$this->start_district;
    }

    public function getEndAddressAttribute()
    {
        return $this->end_province.$this->end_city.$this->end_district;
    }


    public function user()
    {
        return $this->belongsTo(User::class);

    }

}
