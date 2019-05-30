<?php

namespace App\Http\Models;
use App\Http\Models\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Users extends Authenticatable
{
    protected $table = "users"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = ['name','email','password'];//数据添加、修改时允许维护的字段
       //获取评论
    public function posts(){
        return $this->hasMany(\App\Http\Models\Posts::class,'user_id','id')->orderBy("created_at",'desc');
    }
    //我关注的
    public function stars(){
        return $this->hasMany(\App\Http\Models\Fans::class,'fan_id','id');
    }
    //关注我的
    public function fans(){
        return $this->hasMany(\App\Http\Models\Fans::class,'star_id','id');
    }
    public function hasFan($uid){
        return $this->fans->where('fan_id',$uid)->count();
    }

}




















