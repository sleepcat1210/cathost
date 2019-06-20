<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;
class IndexController extends Controller
{
    public function index() {
       return view('admin.index.index');
    }
    public function login() {
            $key="api";
            $nowtime = time();
            $token = [
                'iss' => 'http://www.helloweba.net', //签发者
                'aud' => 'http://www.helloweba.net', //jwt所面向的用户
                'iat' => $nowtime, //签发时间
                'nbf' => $nowtime + 10, //在什么时间之后该jwt才可用
                'exp' => $nowtime + 7200, //过期时间-10min
                'data' => [
                    'userid' => 1,
                    'username' => 2
                ]
            ];
            $jwt = JWT::encode($token, $key);
            $res['result'] = 'success';
            $res['token'] = $jwt;
            return $res;

    }
    //
}
