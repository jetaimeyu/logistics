<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    /**
     * 登录页面
     */
    public function create()
    {
        return view('sessions/create');
    }

    /**
     *登录操作
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $credentials = $this->validate($request, [
            'phone' => 'required|regex:/^1[345789][0-9]{9}$/',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来');
            return redirect('/');
//            if (Auth::user()->activated){
//                session()->flash('success', '欢迎回来');
//                $fallback = route('users.show', Auth::user());
//                return redirect()->intended($fallback);
//            }else{
//                Auth::logout();
//                session()->flash('warning', '你的账号未激活,请检查邮箱中的注册邮件进行激活');
//                return redirect('/');
//            }
        } else {
            session()->flash('danger', '很抱歉， 您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    /**
     * 退出登录
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return  redirect('/');

    }
}
