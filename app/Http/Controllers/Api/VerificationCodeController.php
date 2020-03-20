<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VerificationCodeRequest;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class VerificationCodeController extends Controller
{

    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;
        if (!app()->environment('production')){
            $code =1234;
        }else{
            //随机生成4位数 ，左侧补0
            $code = str_pad(random_int(1,9999), 4,0,STR_PAD_LEFT);
            try{
                $result = $easySms->send($phone, [
                    'template'=> config('easysms.gateways.aliyun.templates.register'),
                    'data'=>[
                        'code'=>$code
                    ]
                ]);
            }catch (NoGatewayAvailableException $exception){
                $message = $exception->getException('aliyun')->getMessage();
                abort(500, $message ?: '短信发送异常');
            }
        }
        $key = 'verificationCode_' . Str::random(15);
        $expiredAt =   now()->addMinute(5);
        //缓存验证码  5分钟过期
        \Cache::put($key, ['phone'=>$phone, 'code'=>$code], $expiredAt);
        return response()->json(['key'=>$key, 'expired_at'=> $expiredAt->toDateTimeString()])->setStatusCode(201);


    }
}