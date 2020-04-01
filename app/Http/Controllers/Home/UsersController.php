<?php

namespace App\Http\Controllers\Home;


use App\Models\User;
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
        $this->validate($request, [
            'phone'=>'required|regex:/^1[34578][0-9]{9}$/|unique:users',
            'verificationCode'=>'required',
            'password'=>'required|confirmed|min:6'
        ], [],['phone'=>'手机号', 'verificationCode'=>'手机验证码']);
        //对比手机验证码
        if (!hash_equals($request->verificationCode, (string) \session('verificationCode'))){
            return back()->withErrors('手机验证码不正确')->withInput();
        }
        $user = User::create([
            'name'=>$request->phone,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);
        auth()->login($user);
        session()->flash('success', '注册成功');
        return redirect('/');
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
        ],[],['phone'=>'手机号', 'captcha'=>'图片验证码']);
        if ($validator->errors()->all()){
            $err = [];
            foreach ($validator->getMessageBag()->toArray() as $key=>$item){
               array_push($err, "<li>".$item[0]."</li>");
            }
            return response()->json(['status'=>0, 'message'=>implode($err)]);
        }
        $captcha = $request->captcha;
        if (!hash_equals($captcha, \session('signImg'))){
            return response()->json(['status'=>0, 'message'=>"<li>图片验证码错误</li>"]);
        }
        $phone = $request->phone;
        if (!app()->environment('production')){
            $code =1234;
        }else {
            $code = str_pad(random_int(0, 9999), 4, 0, STR_PAD_LEFT);
            try {
                $result = $easySms->send($phone, [
                    'template' => config('easysms.gateways.aliyun.templates.register'),
                    'data' => [
                        'code' => $code
                    ]
                ]);

            } catch (NoGatewayAvailableException $exception) {
                $message = $exception->getException('aliyun')->getMessage() ?: '短信发送异常';
                return response()->json(['status' => 0, 'message' => "<li>".$message."</li>"]);
            }
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

    /**
     * 密码重置页面
     */
    public function reset()
    {
        return view('users.reset');
    }

    /**
     * 密码重置提交
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'phone'=>'required|regex:/^1[34578][0-9]{9}$/|exists:users,phone',
            'verificationCode'=>'required',
            'password'=>'required|confirmed|min:6'
        ], [],['phone'=>'手机号', 'verificationCode'=>'手机验证码']);
        //对比手机验证码
        if (!hash_equals($request->verificationCode, (string) \session('verificationCode'))){
            return back()->withErrors('手机验证码不正确')->withInput();
        }
        $user = User::where('phone', $request->phone)->update(['password'=> bcrypt($request->password)]);
        if ($user){
            session()->flash('success', '修改成功');
            return redirect('/login');
        }
    }
}
