<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\GoodsType;
class GoodsTypeController extends Controller
{
       //产品类型首页
    public function index() {
         $goodsType=new GoodsType();
        $data=$goodsType->with(['parents'])->get();
        $goodstype= getTree($data,0);       
       return view("admin.goodsType.index",compact('goodstype'));
    }
    //添加商品类型
    public function add(GoodsType $goodsType){
        $data=$goodsType->get();
        $goodstype= getTree($data,0);        
        return view("admin.goodsType.add",  compact('goodstype'));
    }
       //添加产品分类
    public function insertType(Request $request) {
       $request->validate([
           'type_name'=>'required|max:60',
           'pid'=>'required',          
       ]);
       $goods_type =new GoodsType();
       $goods_type->type_name=request('type_name');
       $goods_type->pid=request('pid');
       $goods_type->uid=0;      
       $goods_type->save();
       return redirect("admin/type/add");
    }
}
