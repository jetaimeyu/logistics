<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthorizationsRequest;
use App\Http\Requests\Api\SocialAuthorizationRequest;
//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Laravel\Socialite\Facades\Socialite;

class AuthorizationsController extends Controller
{
    /**
     * 登录
     * @param AuthorizationsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws AuthorizationException
     */
    public function store(AuthorizationsRequest $request)
    {
        $username =$request->username;
        filter_var($username,FILTER_VALIDATE_EMAIL)?
            $credentials['email'] = $username:
            $credentials['phone'] = $username;
        $credentials['password'] = $request->password;
        if (!$token = auth('api')->attempt($credentials)){
            throw new AuthorizationException('用户名或密码错误');
        }
        return $this->responseWithToken($token);
    }
    /**
     * 第三方登录
     * @param $type
     * @param SocialAuthorizationRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws AuthenticationException
     */
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
        $token= auth('api')->login($user);
        return $this->responseWithToken($token);

    }

    /**
     * 返回token信息
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithToken($token)
    {
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'Bearer',
            'expires_in'=>auth('api')->factory()->getTTL()*60
        ]);

    }

//    public function update()
//    {
//        $token = auth('api')->refresh();
//        $this->responseWithToken($token);
//    }
//
//    public function destroy()
//    {
//        auth('api')->logout();;
//        return response(null, 204);
//
//    }
    public function update()
    {
        $token = auth('api')->refresh();
        return $this->responseWithToken($token);
    }

    public function destroy()
    {
        auth('api')->logout();
        return response(null, 204);
    }
}
