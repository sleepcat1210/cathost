<?php

namespace App\Http\Models;
use App\Http\Models\Model;
class Zans extends Model
{
    protected $table = "zans"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = ['posts_id','user_id'];//数据添加、修改时允许维护的字段
//    //设置软删除
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];
    //关联用户
    public function user(){
        return $this->belongsTo(\App\Http\Models\Users::class,'user_id','id');
    }
    //关联文章
    public function posts(){
         return $this->belongsTo(\App\Http\Models\Posts::class,'posts_id','id');
    }
}




















