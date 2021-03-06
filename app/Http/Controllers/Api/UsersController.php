<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use http\Env\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;

class UsersController extends Controller
{

    //
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);
        if (!$verifyData){
            abort(403, '验证码已失效');
        }
        if (!hash_equals((string) $verifyData['code'], $request->verification_code)){
            throw new AuthenticationException('验证码错误');
        }
        $user = User::create([
            'name'=>$request->name,
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password)
        ]);
        \Cache::forget($request->verification_key);
        return new UserResource($user);
    }

    public function show(User $user, Request $request)
    {
        return new UserResource($user);

    }

    public function me(Request $request)
    {

        return (new UserResource($request->user()))->showSensitiveFields();
    }
}
//https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxb76b4907504e7f24&redirect_uri=http://logistics.com&response_type=code&scope=snsapi_base&state=123#wechat_redirect
