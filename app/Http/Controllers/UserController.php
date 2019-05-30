<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Users;

class UserController extends Controller {

    public function setting() {
        return view('user/setting');
    }

    public function setstore() {
        
    }

    public function show(Users $user) {
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();
        $user = Users::withCount(['posts', 'fans', 'stars'])->find($user->id);
        $fan = $user->fans; //获取所有粉丝  
        $fans = Users::whereIn('id', $fan->pluck('fan_id'))->withCount(['posts', 'fans', 'stars'])->get();
        $star = $user->stars; //获取所有关注       
        $stars = Users::whereIn('id', $star->pluck('star_id'))->withCount(['posts', 'fans', 'stars'])->get();
        return view('user/show', compact(['user', 'posts', 'fans', 'stars']));
    }

    //关注用户
    public function fan(Users $users) {
        $me = \Auth::user();
        $me->doFan($users->id);
        return [
            'error' => 0,
            'msg' => ''
        ];
    }

    //取消关注
    public function unfan(User $user) {
        $me = \Auth::user();
        $me->doUnFan($users->id);
        return [
            'error' => 0,
            'msg' => ''
        ];
    }

}
