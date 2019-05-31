<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsType extends Model
{
    protected $table = "goods_type"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = ['type_name', 'pid']; //数据添加、修改时允许维护的字段

    public function parents()
    {
      return $this->hasOne(get_class($this), $this->getKeyName(), 'pid');
    
    }
      public function childer()
    {
        return $this->hasMany(get_class($this),'pid' ,$this->getKeyName());    
    }
}
