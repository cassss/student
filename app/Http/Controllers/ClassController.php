<?php

namespace App\Http\Controllers;

use App\Data;
use App\Fraction;
use App\Klass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    //Class列表页面
    public function class_v(){
        $classs = Klass::all();
        return view('classs',compact('classs'));
    }
    //Class内容页面
    public function class_c_v(Klass $class){
        //获取section列表
        $sections = $class->sections;
        $video = '';
        if (\request()->has('section')) {
            $section_id=\request('section');
            $video = $sections->where('id',$section_id)->first()->video;
        }
        if(Auth::check()){
            $user_id = Auth::id();
            Fraction::create(compact('user_id'));
        }
        return view('class',compact('class','sections','video'));

    }
    //资料列表页面
    public function datas_v(){
        $datas = Data::all();
        return view('datas',compact('datas'));
    }
}
