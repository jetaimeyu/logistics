<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CaptchasRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaptchasController extends Controller
{
    //
    public function store(CaptchasRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-' . Str::random(15);
        $phone = $request->phone;

        $captcha = $captchaBuilder->build();
        $expired_at = now()->addMinute(50);
        \Cache::put($key, ['phone'=>$phone, 'code'=>$captcha->getPhrase()]);
        $result = [
            'captcha_key'=>$key,
            'captcha_image_content'=>$captcha->inline(),
            'expired_at'=>$expired_at,
            'code'=>$captcha->getPhrase()
        ];
        return response()->json($result)->setStatusCode(201);

    }
}
