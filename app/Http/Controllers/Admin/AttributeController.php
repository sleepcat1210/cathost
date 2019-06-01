<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodsType;
use App\Models\Attribute;
class AttributeController extends Controller
{
    public function index(GoodsType $goodsType) {
        $attr=  Attribute::where('cat_id',$goodsType->id)->orderby('id','desc')->with('goodsType')->get();
        foreach($attr as &$v){
            $v['attr_values']= str_replace("\n", ", ", $v['attr_values']);
        }
        return view('admin.attribute.index',  compact('goodsType','attr'));
    }
    //添加属性
    public function addAttr(GoodsType $goodsType) {
        $data=$goodsType->get();
        $type= getTree($data,0);
        return view('admin.attribute.addAttr',  compact('goodsType','type'));
    }
    //插入
    public function insertAttr(Request $request) {       
         $request->validate([
           'attr_name'=>'required|max:60',
           'cat_id'=>'required',          
           'attr_index'=>'required',          
           'attr_type'=>'required',          
           'attr_input_type'=>'required',          
       ]);
        $attr =new Attribute();
        $attr->attr_name=request('attr_name');
        $attr->cat_id=request('cat_id');
        $attr->attr_index=request('attr_index');
        $attr->attr_type=request('attr_type');
        $attr->attr_input_type=request('attr_input_type');
        $attr->attr_values=request('attr_values');
        $result=$attr->save();
        if($result){
           $array=array('success'=>true);
       }else{
         $array=array('success'=>false);   
       }
       return $array;
    }
}
