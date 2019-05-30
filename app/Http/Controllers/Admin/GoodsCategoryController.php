<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodsCategory;
use Illuminate\Support\Facades\Storage;
class GoodsCategoryController extends Controller
{
    //产品分类首页
    public function index() {
        $goodsCategory=new GoodsCategory;
        $data=$goodsCategory->with(['parent'])->get();
        $goodscate= getTree($data,0);          
        return view("admin.goodsCategory.index",  compact('goodscate'));
    }
    //添加产品分类
    public function addCategory(GoodsCategory $goodsCategory) {
        $data=$goodsCategory->get();
        $goodscate= getTree($data,0);        
        return view("admin.goodsCategory.add",  compact('goodscate'));
    }
      //添加产品分类
    public function insertCategory(Request $request) {
       $request->validate([
           'category_name'=>'required|max:60',
           'pid'=>'required',
           'img'=>'required'
       ]);
       $goods_category =new GoodsCategory();
       $goods_category->category_name=request('category_name');
       $goods_category->pid=request('pid');
       $goods_category->category_img=request('img');
       $goods_category->content=request('content');
       $goods_category->save();
       return redirect("admin/addcategory");
    }
    //编辑分类
    public function edit(GoodsCategory $goodscategory){
        $goodsCategory=new GoodsCategory();
        $data=$goodsCategory->get();
        $goodscate= getTree($data,0);
       return view('admin.goodsCategory.edit',  compact(['goodscategory','goodscate']));
    }
      public function update(GoodsCategory $goodscategory){
       $goodscategory->category_name=request('category_name');
       $goodscategory->pid=request('pid');
       if(request('img')){
            $goodscategory->category_img=request('img'); 
       }     
       $goodscategory->content=request('content');
       $result=$goodscategory->update();
       if($result){
           $array=array('success'=>true);
       }else{
         $array=array('success'=>false);   
       }
       return $array;
    }
    public function delete(GoodsCategory $goodscategory) {   

        if($goodscategory->childer()->count()){
            $array=array('success'=>false,'msg'=>'请先删除下级分类！');  
        }else{
             //获取图片
//            $category_img=$goodscategory->category_img;
//             @unlink("/".$category_img);
//            if($category_img){
//                $res=Storage::disks('public')->delete($category_img);
//                dd($res);
//            }            
             $goodscategory->delete();
             $array=array('success'=>true,'msg'=>'删除成功！');  
        }
       return   $array;
    }

}
