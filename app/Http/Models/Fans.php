<?php

namespace App\Http\Models;
use App\Http\Models\Model;
class Fans extends Model
{
    protected $table = "fans"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = ['fans_id','star_id'];//数据添加、修改时允许维护的字段
//    //设置软删除
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];
    //粉丝
    public function fuser(){
        return $this->hasOne(\App\Http\Models\Users::class,'id','star_id');
    }
    //关注
    public function suser(){
         return $this->belongsTo(\App\Http\Models\Users::class,'id','fan_id');
    }
}




















