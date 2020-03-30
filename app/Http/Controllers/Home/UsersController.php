<?php

namespace App\Http\Controllers\Home;


use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use http\Env\Response;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class UsersController extends Controller
{


    /**
     * 注册
     */
    public function Create()
    {
        return view('users.create');
    }

    /**
     * 新增保存
     */
    public function store(Request $request)
    {
        $builder = new CaptchaBuilder();
        $d = $builder->testPhrase($request->captcha);
        dd($d, \session('signImg'), $request->all());

    }

    /**
     * 编辑页面
     */
    public function edit()
    {

    }

    /**
     * 修改
     */
    public function update()
    {

    }

    /**
     * 获取短信验证码
     */
    public function getVerificationCode(Request $request, EasySms $easySms)
    {

        $validator = Validator::make($request->all(),[
            'phone'=>'required|regex:/^1[34578][0-9]{9}$/',
            'captcha'=>'required'
        ]);
        if ($validator->errors()->all()){
            return response()->json(['status'=>0, 'message'=>$validator->errors()->getMessages()]);
        }
        $captcha = $request->captcha;
        if (!hash_equals($captcha, \session('signImg'))){
            return response()->json(['status'=>0, 'message'=>'图片验证码错误']);
        }
        $phone = $request->phone;
        $code = str_pad(random_int(0,9999),4,0,STR_PAD_LEFT);
        try{
            $result = $easySms->send($phone, [
                'template'=> config('easysms.gateways.aliyun.templates.register'),
                'data'=>[
                    'code'=>$code
                ]
            ]);

        }catch (NoGatewayAvailableException $exception){
            $message = $exception->getException('aliyun')->getMessage() || '短信发送异常';
            return response()->json(['status'=>0, 'message'=>$message]);
        }
        \session(['verificationCode'=>$code]);
        return response()->json(['status'=>1, 'message'=>'发送成功']);

    }

    /**
     * 获取图片验证码
     * @param $temp
     */
    public function captcha($temp)
    {
        $phraseBuilder = new PhraseBuilder(4, '0123456789');
        $builder = new CaptchaBuilder(4, $phraseBuilder);
        $builder->build();
        //获取验证码内容
        $phrase = $builder->getPhrase();
        \session(['signImg' => $phrase]);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->save('out.jpg');
        $builder->output();
    }


}
