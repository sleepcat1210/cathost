<?php

namespace App\Http\Models;
use App\Http\Models\Model;
class Posts extends Model
{
    protected $table = "posts"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = ['title','content','user_id'];//数据添加、修改时允许维护的字段
//    //设置软删除
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];
    //关联用户
    public function user(){
        return $this->belongsTo(\App\Http\Models\Users::class,'user_id','id');
    }
    //获取评论
    public function comments(){
        return $this->hasMany(\App\Http\Models\Comments::class,'posts_id','id')->orderBy("created_at",'desc');
    }
    //文章关联攒
    public function zan($user_id){
        return $this->hasOne(\App\Http\Models\Zans::class,'posts_id','id')->where('user_id',$user_id); 
    }
      public function zans(){        
        return $this->hasMany(\App\Http\Models\Zans::class,'posts_id','id');
    }
    //粉丝
    public function fans(){
        return $this->hasMany(\App\Http\Models\Fans::class,'star_id','id');
    }
}




















