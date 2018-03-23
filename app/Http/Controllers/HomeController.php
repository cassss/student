<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Home页面
    public function home_v(){
        return view('home');
    }
}
