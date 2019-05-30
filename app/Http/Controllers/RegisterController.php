<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class RegisterController extends Controller {
 //注册页面
    public function index(){
        return view('register/index');
    }
  //注册行为
    public function register(Request $request){
//        dd(request('name'));
        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:5|confirmed'
        ]);
        $name=request('name');//用户姓名
        $email=request('email');//邮件
        $password=bcrypt(request('password'));//密码
        $user=Users::create(compact('name','email','password'));
        return redirect('login');
    }

}
