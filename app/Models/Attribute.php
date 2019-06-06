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
     public function getAttrInput($type_id)
    {
        header("Content-type: text/html; charset=utf-8");                                      
        $attributeList = $this::where([
             ['cat_id','=',$type_id],
             ['attr_type','<>',1]
        ])->get(); 
         $str='';
         
        foreach($attributeList as $key => $val)
        {   
              $curAttrVal=array();
             if(count($curAttrVal) == 0)
                $curAttrVal[] = array('goods_attr_id' =>'','goods_id' => '','attr_id' => '','attr_value' => '','attr_price' => '');
            foreach($curAttrVal as $k =>$v)
            {                                        
                            $str .= "<tr class='attr_{$val['attr_id']}'>";            
                            $addDelAttr = ''; // 加减符号
                            // 单选属性 或者 复选属性
                            if($val['attr_type'] == 1 || $val['attr_type'] == 2)
                            {
                                if($k == 0)                                
                                    $addDelAttr .= "<a onclick='addAttr(this)' href='javascript:void(0);'>[+]</a>&nbsp&nbsp";                                                                    
                                else                                
                                     $addDelAttr .= "<a onclick='delAttr(this)' href='javascript:void(0);'>[-]</a>&nbsp&nbsp";                               
                            }

                            $str .= "<td>$addDelAttr {$val['attr_name']}</td> <td>";   
                            // 手工录入
                            if($val['attr_input_type'] == 0)
                            {
                               
                                $str .= "<input type='text' size='40' value='{$v['attr_value']}' name='attr_{$val['attr_id']}[]' />";
                            
                            }
                            // 从下面的列表中选择（一行代表一个可选值）
                            if($val['attr_input_type'] == 1)
                            {
                                $str .= "<select name='attr_{$val['attr_id']}[]'>";                              
                                $tmp_option_val =explode(',',str_replace("\n", ", ", $val['attr_values']));
                                foreach($tmp_option_val as $k2=>$v2)
                                {
                                    // 编辑的时候 有选中值
                                    if($v['attr_value'] == $v2)
                                        $str .= "<option selected='selected' value='{$v2}'>{$v2}</option>";
                                    else
                                        $str .= "<option value='{$v2}'>{$v2}</option>";
                                }
                                $str .= "</select>";         
                            }
                            // 多行文本框
                            if($val['attr_input_type'] == 2)
                            {
                                $str .= "<textarea cols='40' rows='3' name='attr_{$val['attr_id']}[]'>{$v['attr_value']}</textarea>";                               
                            }                                                        
                            $str .= "</td></tr>";
                                 
            }                        
            
        }        
        return  $str;
    }
}
