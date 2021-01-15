<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Array_;
use Psy\Util\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        var_dump('ddd');
    }

    use Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'weixin_openid', 'weixin_unionid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'weixin_openid', 'weixin_unionid'
    ];


    //追加包含在模型的数组与json中
    protected $appends = [
        'format_name','created_time'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d Y-m-d H:i:s'
    ];


    /**
     * 为数组 / JSON 序列化准备日期。
     * @param  \DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    public function getFormatNameAttribute()
    {
        return $this->name . $this->id;
    }

    public function getCreatedTimeAttribute()
    {
        return $this->created_at->toJson();

    }

    public function getCreatedTimeTwoAttribute()
    {
        return $this->created_at->toDateTimeString();
    }


    public function addHidden($array)
    {
        $this->hidden = array_merge($this->hidden, $array);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function company()
    {
        return $this->hasOne('App\Models\CompanyInfo');
    }

    public function logisticsLine()
    {
        return $this->hasMany(LogisticsLine::class);
    }
}
