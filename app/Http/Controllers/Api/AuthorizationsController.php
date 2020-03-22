<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\SocialAuthorizationRequest;
//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Laravel\Socialite\Facades\Socialite;

class AuthorizationsController extends Controller
{
    //
    public function socialStore($type, SocialAuthorizationRequest $request)
    {
        $driver = Socialite::driver($type);
        try{
            if ($code= $request->code){
                $response = $driver->getAccessTokenResponse($code);
                $token = Arr::get($response, 'access_token');

            }else{
                $token =$request->access_token;
                if ($type=='weixin'){
                    $driver->setOpenId($request->openid);
                }
            }
            $authUser = $driver->userFromToken($token);
        }catch (\Exception $exception){
            throw new AuthenticationException('参数错误， 未获取用户信息');
        }
        switch ($type){
            case 'weixin':
                $unionId = $authUser->offsetExists('unionid')?$authUser->offsetGet('unionid'):null;
                if ($unionId){
                    $user = User::where('weixin_unionid',$unionId)->first;
                }else{
                    $user = User::where('weixin_openid', $authUser->getId())->first();
                }
                if (!$user){
                    $user = User::create([
                        'name'=>$authUser->getNickname(),
                        'avatar'=>$authUser->getAvatar(),
                        'weixin_openid'=>$authUser->getId(),
                        'weixin_unionid'=>$unionId,
                    ]);
                }
                break;
        }
        return response()->json(['token'=>$user->id]);

    }

}
