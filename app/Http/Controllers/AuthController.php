<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //注册行为
    public function register(){
        //验证
        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:5|max:22|confirmed',
        ]);
        //逻辑
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $user = User::create(compact('name','email','password'));
        //渲染
        return redirect('/login');
    }
    //登陆行为
    public function login(){
        //验证
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required|min:5|max:10',
            'is_remember'=>'integer'
        ]);
        //逻辑
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember')) ;
        if(Auth::attempt($user,$is_remember)){
            return redirect('/home');
        }else{
            //渲染
            return redirect()->back()->withErrors("邮箱密码不匹配");
        }
    }
    //登出行为
    public function logut(){
        Auth::logout();
        return redirect('/login');
    }
}
