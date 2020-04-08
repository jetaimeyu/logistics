<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function create()
    {
        return view('company/create');
    }

    public function store(Request $request)
    {
        dd($request);
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
