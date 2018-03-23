<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //注册页面
    public function register_v(){
        return view('auth.register');
    }
    //注册行为
    public function register(){
        //验证
        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:5|max:22|confirmed',
        ],[
            'required'=>':attribute不可为空',
            'unique'=>':attribute已存在',
            'email'=>':attribute必须为邮箱格式',
            'min'    =>':attribute长度过短，不要低于5字符',
            'max'=>':attribute长度过长，不要超过22字符',
            'confirmed'=>'两次:attribute不同'
        ],[
            'name'=>'用户名',
            'email'=>'邮箱',
            'password'=>'密码'
        ]
        );
        //逻辑
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $user = User::create(compact('name','email','password'));
        //渲染
        return redirect('/login');
    }

    //注册页面
    public function login_v(){
        return view('auth.login');
    }
    //登陆行为
    public function login(){
        //验证
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required|min:5|max:22',
        ],[
            'required'=>':attribute不可为空',
            'min'    =>':attribute长度过短，不要低于5字符',
            'max'=>':attribute长度过长，不要超过22字符',
            'email'=>':attribute必须为邮箱格式'
        ],[
                'name'=>'用户名',
                'email'=>'邮箱',
                'password'=>'密码'
            ]
        );
        //逻辑
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember')) ;
        if(Auth::attempt($user,$is_remember)){
            return redirect('/');
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
