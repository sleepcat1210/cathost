<?php

namespace App\Http\Middleware;

use Firebase\JWT\JWT;
use Closure;

class CheckToken {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //获取header ---token
        $token = $request->header('token');
        if ($token) {
            $key = "api";
            try {
                JWT::$leeway = 7200;
                $decoded = JWT::decode($token, $key, ['HS256']);
            } catch (\Firebase\JWT\SignatureInvalidException $e) {
                $res['msg'] = 'Token验证失败,请重新登录';
                return response()->json($res);
            } catch (\Firebase\JWT\ExpiredException $e) {
                $res['msg'] = 'Token过期,请重新登录';
                return response()->json($res);
            }
         
        }else{
            $res['msg'] = '参数错误 token不能为空！';
            return response()->json($res); 
        }
        return $next($request);
    }

}
