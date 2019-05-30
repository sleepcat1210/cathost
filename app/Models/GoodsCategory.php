<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model {

    protected $table = "goods_category"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = ['category_name', 'pid', 'category_img', 'content']; //数据添加、修改时允许维护的字段

    public function parent()
    {
    return $this->hasOne(get_class($this), $this->getKeyName(), 'pid');
    
    }
      public function childer()
    {
        return $this->hasMany(get_class($this),'pid' ,$this->getKeyName());    
    }

}
