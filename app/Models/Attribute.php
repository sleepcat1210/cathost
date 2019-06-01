<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = "attribute"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = ['attr_name', 'cat_id', 'attr_index', 'attr_type','attr_input_type','attr_values']; //数据添加、修改时允许维护的字段

    public function goodsType(){
        return $this->belongsTo(\App\Models\GoodsType::class,'cat_id',$this->primaryKey);
    }
}
