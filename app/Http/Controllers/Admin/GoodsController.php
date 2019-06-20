<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodsType;
use App\Models\Attribute;
class GoodsController extends Controller
{
    public function index() {
        return view('admin.goods.index');
    }
     public function addGoods() {
         //商品类型
         $goodsType=new GoodsType();
         $type =$goodsType::get();
        return view('admin.goods.add',  compact('type'));
    }
    //获取商品规格属性
    public function ajaxGetGoodsSpac() {
        $cat_id=  request('spec_type');
         $attr=new Attribute();
         $goods_attr=$attr::where([
            ['cat_id','=',$cat_id],
             ['attr_type','=',1]
         ])->get();
         foreach($goods_attr as $k=>&$v){
             $v['attr_values']= explode(',',str_replace("\n", ", ", $v['attr_values']));
         }
        return view('admin.goods.ajax_spac',  compact('goods_attr'));
//        return $goods_attr;
    }
    
    //获取商品规格属性
    public function ajaxGetGoodsAttr() {
        $cat_id=  request('type_id');       
         $attr=new Attribute();
         $goods_attr=$attr->getAttrInput($cat_id);         
         return $goods_attr;
    }
    //添加商品
    public function insertGoods() {
        dd(request());
    }
}
