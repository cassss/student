<?php

namespace App\Http\Controllers;

use App\Data;
use App\Klass;
use App\Section;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //上传文件
    protected function imageUpload($file){
        $path =  $file->store(md5(time()));
        return asset('storage/'.$path);
    }
    //后台登录页面
    public function login_v(){
        Auth::logout();
        return view('admin.login');
    }
    //后台登陆行为
    public function login(){
        Auth::logout();
        //验证
        $this->validate(request(),[
            'name'=>'required|string',
            'password'=>'required|min:5|max:22',
        ],[
            'required'=>':attribute不可为空',
            'min'    =>':attribute长度过短，不要低于5字符',
            'max'=>':attribute长度过长，不要超过22字符',
            'email'=>':attribute必须为邮箱格式'
        ],[
                'name'=>'用户名',
                'password'=>'密码'
            ]
        );
        //逻辑
        $user = request(['name','password']);
        $user['root'] = 1;
        $is_remember = boolval(request('is_remember')) ;
        if(Auth::attempt($user,$is_remember)){
            return redirect('/admin');
        }else{
            //渲染
            return redirect()->back()->withErrors("邮箱密码不匹配");
        }
    }
    public function admin(){
        $classs = Klass::all();
        return view('admin.app',compact('classs'));
    }
    public function newclass_v(){
        return view('admin.newclass');
    }
    public function newclass(Request $request){
        $this->validate(request(),[
            'name'=>'required|string',
            'teacher_name'=>'required|string|exists:teachers,name',
            'introduce'=>'required|string',
            'file'=>'required|image',
        ],[
            'required'=>':attribute不可为空',
            'string'=>':attribute必须是字符串',
            'exists'=>'无:attribute老师',
            'image'=>':attribute必须是一个图像（ jpeg、png、bmp、gif、或 svg ）',
        ],[
                'name'=>'课程名',
                'introduce'=>'课程介绍',
                'file'=>'文件',
            ]
        );
        $img = $this->imageUpload($request->file('file'));
        $name = $request->name;
        $introduce = $request->introduce;
        $teacher_id = Teacher::where('name', $request->teacher_name)->first()->id;
        $class = Klass::create(compact('name','introduce','img','teacher_id'));
        if ($class){
            return redirect('/admin')->with(['success'=>'添加成功!']);
        }else{
            return redirect()->back()->withErrors('添加失败请重试！');
        }
    }
    public function sections_v(Klass $class){
        $title = $class->name;
        $id = $class->id;
        $sections = $class->sections;
        return view('admin.sections',compact('title','id','sections'));
    }
    public function section_v(Section $section){
        $title = $section->klass->name.'-'.$section->name;
        return view('admin.section',compact('title','section'));
    }
    public function newsection_v(Klass $class){
        return view('admin.newsection',compact('class'));
    }
    public function newsection(Request$request,Klass $class){
        $this->validate(request(),[
            'name'=>'required|string',
            'file'=>'required',
        ],[
            'required'=>':attribute不可为空',
            'string'=>':attribute必须是字符串',
            'mimes'=>':attribute必须是一个mp4视频',
        ],[
                'name'=>'课程名',
                'introduce'=>'课程介绍',
                'file'=>'文件',
            ]
        );
        $video = $this->imageUpload($request->file('file'));
        $name = $request->name;
        $klass_id = $class->id;
        $class = Section::create(compact('name','klass_id','video'));
        if ($class){
            return redirect('/admin')->with(['success'=>'添加成功!']);
        }else{
            return redirect()->back()->withErrors('添加失败请重试！');
        }
    }
    public function newteacher_v(Request $request){
        return view('admin.newteacher');
    }
    public function newteacher(Request $request){
        $this->validate(request(),[
            'name'=>'required|string',
        ],[
            'required'=>':attribute不可为空',
            'string'=>':attribute必须是字符串',
        ],[
                'name'=>'教师名',
            ]
        );
        $name = $request->name;
        $class = Teacher::create(compact('name'));
        if ($class){
            return redirect('/admin')->with(['success'=>'添加成功!']);
        }else{
            return redirect()->back()->withErrors('添加失败请重试！');
        }
    }
    public function teachers_v(){
        $teachers = Teacher::all();
        return view('admin.teachers',compact('teachers'));
    }
    public function newdata_v(){
        return view('admin.newdata');
    }
    public function newdata(Request $request){
        $this->validate(request(),[
            'name'=>'required|string',
            'file'=>'required',
        ],[
            'required'=>':attribute不可为空',
            'string'=>':attribute必须是字符串',
            'mimes'=>':attribute必须是一个mp4视频',
        ],[
                'name'=>'资料名',
                'file'=>'文件',
            ]
        );
        $name = $request->name;
        $data = $this->imageUpload($request->file('file'));
        $class = Data::create(compact('name','data'));
        if ($class){
            return redirect('/admin')->with(['success'=>'添加成功!']);
        }else{
            return redirect()->back()->withErrors('添加失败请重试！');
        }
    }

}
