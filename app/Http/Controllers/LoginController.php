<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class LoginController extends Controller {
//登录页面
    public function index(){
        return view('login/index');
    }
    
    //登录行为
    public function login(){
        $this->validate(request(),[
             'email'=>'required|email',
            'password'=>'required|min:5',
            'is_remember'=>'integer'
        ]);
        //逻辑
        $user=request(['email','password']);
        $is_remember=  boolval(request('is_remember'));
        if(\Auth::attempt($user,$is_remember)){
            return redirect("posts");
        }
        return \Redirect::back()->withErrors("邮箱密码不匹配！");
    }
    //退出
    public function logout(){
        \Auth::logout();
        return redirect('login');
    }

}
